<?php
namespace App\Controllers;

require_once '../app/core/Controller.php';
require_once '../app/models/User.php';

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        require_once '../app/views/auth/login.php';
    }

    public function login()
    {
        $email    = $_POST['login'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $error = "Email dan password wajib diisi.";
            require_once '../app/views/auth/login.php';
            return;
        }

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if (!$user || !password_verify($password, $user['password'])) {
            $error = "Email atau password salah.";
            require_once '../app/views/auth/login.php';
            return;
        }

        $_SESSION['user_id']   = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];

        header('Location: /activities');
        exit();
    }

    public function signup()
    {
        require_once '../app/views/auth/register.php';
    }

    public function register()
    {
        $name     = $_POST['name'] ?? '';
        $email    = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (empty($name) || empty($email) || empty($password)) {
            $error = "Semua field wajib diisi.";
            require_once '../app/views/auth/register.php';
            return;
        }

        $userModel = new User();
        $result    = $userModel->register($_POST);

        if ($result === 'email_taken') {
            $error = "Email sudah digunakan.";
            require_once '../app/views/auth/register.php';
            return;
        }

        if ($result === 'success') {
            header('Location: /login?msg=registered');
            exit();
        }

        $error = "Gagal mendaftar, coba lagi.";
        require_once '../app/views/auth/register.php';
    }

    public function logout()
    {
        session_destroy();
        header('Location: /login');
        exit();
    }
}