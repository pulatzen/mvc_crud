<?php

namespace app\controllers;

use app\models\User;

class DeleteController
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $id = $_GET['id'];
        $this->user->delete($id);

        header("Location: /users");
        exit;
    }
}
