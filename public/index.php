<?php
ob_start();
session_start();
require_once '../app/core/Router.php';

use App\Core\Router;

$router = new Router();

$router->add('GET', '/', 'AuthController', 'index');
$router->add('GET', '/login', 'AuthController', 'index');
$router->add('GET', '/volunteers', 'VolunteerController', 'index');
$router->add('GET', '/volunteers/create', 'VolunteerController', 'create');
$router->add('GET', '/volunteers/{id}', 'VolunteerController', 'show');
$router->add('GET', '/activities', 'ActivityController', 'index');
$router->add('GET', '/activities/create', 'ActivityController', 'create');
$router->add('GET', '/activities/{id}', 'ActivityController', 'show');
$router->add('GET', '/admin/activities', 'ActivityController', 'manage');
$router->add('GET', '/admin/activities/create', 'ActivityController', 'create');
$router->add('POST', '/admin/activities', 'ActivityController', 'store');
$router->add('GET', '/admin/activities/{id}/edit', 'ActivityController', 'edit');
$router->add('POST', '/admin/activities/{id}/update', 'ActivityController', 'update');
$router->add('POST', '/admin/activities/{id}/delete', 'ActivityController', 'destroy');
$router->add('GET', '/register', 'AuthController', 'signup');
$router->add('POST', '/register', 'AuthController', 'register');
$router->add('POST', '/login', 'AuthController', 'login');
$router->add('POST', '/activities/{id}/register', 'RegistrationController', 'store');
$router->add('POST', '/activities/{id}/unregister', 'RegistrationController', 'destroy');
$router->add('GET', '/profile', 'ProfileController', 'index');
$router->add('POST', '/profile/upload', 'ProfileController', 'upload');
$router->add('GET', '/admin/verification','ActivityController', 'verification');


$router->run();
?>
