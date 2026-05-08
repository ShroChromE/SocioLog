<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/Registration.php';

use App\Core\Controller;
use App\Models\Registration;

class RegistrationController extends Controller
{
    public function store(string $activityId)
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $userId     = (int) $_SESSION['user_id'];
        $activityId = (int) $activityId;

        $model  = new Registration();
        $result = $model->register($userId, $activityId);

        if ($result === 'already_registered') {
            header("Location: /activities/{$activityId}?msg=already_registered");
        } elseif ($result === 'success') {
            header("Location: /activities/{$activityId}?msg=registered");
        } else {
            header("Location: /activities/{$activityId}?msg=failed");
        }
        exit();
    }

    public function destroy(string $activityId)
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: /login');
            exit();
        }

        $userId     = (int) $_SESSION['user_id'];
        $activityId = (int) $activityId;

        $model = new Registration();
        $model->unregister($userId, $activityId);

        header("Location: /activities/{$activityId}?msg=unregistered");
        exit();
    }
}