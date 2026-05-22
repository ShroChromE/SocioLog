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
        $activityModel = new Activity();
        $activities = $activityModel->getActivities();

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
        $id = intval($id);
        $activityModel = new Activity();
        $activity = $activityModel->getActivity($id);

        $this->view('activities.show', [
            'activity' => $activity
        ]);
    }

    public function manage()
    {
        $activityModel = new Activity();
        $activities = $activityModel->getActivities();

        $this->view('admin.activities', [
            'activities' => $activities
        ]);
    }
    public function profile()
{
    $activityModel = new Activity();
    $activities = $activityModel->getActivities();

    $this->view('activities.profile', [
        'activities' => $activities
    ]);
}
    public function edit(string $id)
    {
        $id = intval($id);
        $activityModel = new Activity();
        $activity = $activityModel->getActivity($id);

        $this->view('activities.edit', [
            'activity' => $activity
        ]);
    }

    public function store()
    {
        $activityModel = new Activity();
        $data = array_merge($_POST, $this->uploadedActivityImages());

        $activityModel->insert($data);
    }

    public function update(string $id)
    {
        $id = intval($id);
        $activityModel = new Activity();
        $data = array_merge($_POST, $this->uploadedActivityImages());

        $activityModel->update($data, $id);
    }

    public function destroy(string $id)
    {
        $id = intval($id);
        $activityModel = new Activity();
        $activityModel->delete($id);
    }

    private function uploadedActivityImages(): array
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

            $uploaded[$field] = $this->storeActivityImage($_FILES[$field]);
        }

        return $uploaded;
    }

    private function storeActivityImage(array $file): string
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

        $uploadDir = dirname(__DIR__, 2) . '/public/assets/uploads/activities';
        if (!is_dir($uploadDir) && !mkdir($uploadDir, 0775, true)) {
            die('Folder upload tidak dapat dibuat.');
        }

        $filename = uniqid('activity_', true) . '.' . $extension;
        $target = $uploadDir . '/' . $filename;

        if (!move_uploaded_file($file['tmp_name'], $target)) {
            die('Gagal menyimpan gambar.');
        }

        return '/assets/uploads/activities/' . $filename;
    }

}
