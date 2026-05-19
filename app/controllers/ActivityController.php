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

     public function verification()
    {
        $activityModel = new Activity();
        $activities = $activityModel->getActivities();

        $this->view('admin.verification', [
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
        $activityModel->insert($_POST);
    }

    public function update(string $id)
    {
        $id = intval($id);
        $activityModel = new Activity();
        $activityModel->update($_POST, $id);
    }

    public function destroy(string $id)
    {
        $id = intval($id);
        $activityModel = new Activity();
        $activityModel->delete($id);
    }

}