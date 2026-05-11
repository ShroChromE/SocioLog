<?php
ob_start();
session_start();
require_once '../app/core/Router.php';

use App\Core\Router;

$router = new Router();

// Register Routes
$router->add('GET', '/', 'AuthController', 'index');
$router->add('GET', '/login', 'AuthController', 'index');
$router->add('GET', '/volunteers', 'VolunteerController', 'index');
$router->add('GET', '/volunteers/create', 'VolunteerController', 'create');
$router->add('GET', '/volunteers/{id}', 'VolunteerController', 'show');
$router->add('GET', '/activities', 'ActivityController', 'index');
$router->add('GET', '/activities/create', 'ActivityController', 'create');
$router->add('GET', '/activities/{id}', 'ActivityController', 'show');
$router->add('GET', '/activities/manage', 'ActivityController', 'manage');
$router->add('GET', '/register', 'AuthController', 'signup');
$router->add('POST', '/register', 'AuthController', 'register');
$router->add('POST', '/login', 'AuthController', 'login');
$router->add('POST', '/activities/{id}/register',   'RegistrationController', 'store');
$router->add('POST', '/activities/{id}/unregister', 'RegistrationController', 'destroy');
$router->add('GET', '/profile', 'ActivityController', 'profile');

$router->run();

?>