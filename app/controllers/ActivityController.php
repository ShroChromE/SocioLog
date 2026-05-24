<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/Activity.php';

use App\Core\Controller;
use App\Models\Activity;

class ActivityController extends Controller
{
    public function index()
    {
        require_once '../app/models/Registration.php';
        $activityModel = new Activity();
        $regModel      = new \App\Models\Registration();
        $activities    = $activityModel->getActivities();
        foreach ($activities as &$activity) {
            $accepted           = $regModel->countAccepted($activity['id']);
            $activity['sisa']   = max(0, $activity['quota'] - $accepted);
            $activity['penuh']  = $activity['sisa'] === 0;
        }
        unset($activity);
        $this->view('activities.index', [
            'activities' => $activities
        ]);
    }

    public function create()
    {
        $this->view('activities.create');
    }

    public function show(string $id)
    {
        require_once '../app/models/Registration.php';
        $id            = intval($id);
        $activityModel = new Activity();
        $regModel      = new \App\Models\Registration();
        $activity      = $activityModel->getActivity($id);
        $accepted          = $regModel->countAccepted($id);
        $activity['sisa']  = max(0, $activity['quota'] - $accepted);
        $activity['penuh'] = $activity['sisa'] === 0;
        $this->view('activities.show', [
            'activity' => $activity
        ]);
    }

    public function manage()
    {
        $activityModel = new Activity();
        $activities = $activityModel->getAllActivities();

        $this->view('admin.activities', [
            'activities' => $activities
        ]);
    }

    public function edit(string $id)
    {
        $id = intval($id);
        $activityModel = new Activity();
        $activity = $activityModel->getActivity($id);

        $this->view('admin.edit', [
            'activity' => $activity
        ]);
    }

    public function store()
    {
        $activityModel = new Activity();
        $id = $activityModel->insert($_POST);
        $images = $this->uploadedActivityImages($id);
        if (!empty($images)) {
            $activityModel->update(array_merge($_POST, $images), $id);
        }
        header('Location: /admin/activities');
        exit();
    }

    public function update(string $id)
    {
        $id = intval($id);
        $activityModel = new Activity();
        $images = $this->uploadedActivityImages($id);

        $activityModel->update(array_merge($_POST, $images), $id);
    }

    public function destroy(string $id)
    {
        $id = intval($id);
        $activityModel = new Activity();
        $activityModel->delete($id);
    }

    public function close(string $id)
    {
        if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
            header('Location: /activities');
            exit();
        }

        $id = intval($id);

        $activityModel = new Activity();
        $activityModel->updateStatus($id, 'inactive');

        require_once '../app/models/Registration.php';
        $regModel = new \App\Models\Registration();
        $regModel->removePendingByActivity($id);

        header('Location: /admin/activities');
        exit();
    }

    private function uploadedActivityImages(int $activityId): array
    {
        $fields = [
            'thumbnail',
            'documentation-1',
            'documentation-2',
            'documentation-3',
            'documentation-4',
        ];

        $uploaded = [];

        foreach ($fields as $field) {
            if (!isset($_FILES[$field]) || $_FILES[$field]['error'] === UPLOAD_ERR_NO_FILE) {
                continue;
            }

            $uploaded[$field] = $this->storeActivityImage($_FILES[$field], $activityId);
        }

        return $uploaded;
    }

    private function storeActivityImage(array $file, int $activityId): string
    {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            die('Gagal mengunggah gambar.');
        }

        if (!is_uploaded_file($file['tmp_name']) || getimagesize($file['tmp_name']) === false) {
            die('File harus berupa gambar.');
        }

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        if (!in_array($extension, $allowedExtensions, true)) {
            die('Format gambar harus JPG, PNG, atau WEBP.');
        }

        // save to /public/assets/activity{id}/
        $uploadDir = dirname(__DIR__, 2) . '/public/assets/activity' . $activityId;
        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0775, true)) {
            die('Folder upload tidak dapat dibuat.');
        }

        $filename = $file['name'];
        $target   = $uploadDir . '/' . $filename;

        if (!move_uploaded_file($file['tmp_name'], $target)) {
            die('Gagal menyimpan gambar.');
        }

        return '/assets/activity' . $activityId . '/' . $filename;
    }
}