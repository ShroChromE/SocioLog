<?php
namespace App\Core;

use Exception;

class Controller
{
    public function view(string $view, array $data = [])
    {
        $view = str_replace('.', '/', $view);
        extract($data);

        $content = "../app/views/$view.php";
        $role    = $_SESSION['user_role'] ?? 'volunteer';
        $layout  = $role === 'admin' ? '../app/views/layouts/admin.php' : '../app/views/layouts/app.php';

        require_once $layout;
    }
}
?>