<?php
namespace app\controllers;

class VolunteerController
{
    public function index()
    {
        require_once '../app/views/volunteers/index.php';
    }

    public function create()
    {
        require_once '../app/views/volunteers/create.php';
    }

    public function show(string $id)
    {
        require_once '../app/views/volunteers/show.php';

    }

}