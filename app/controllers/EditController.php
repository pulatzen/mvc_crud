<?php

namespace app\controllers;

use app\models\User;

class EditController
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        if (!isset($_GET['id'])) {
            die('User ID not provided');
        }

        $id = $_GET['id'];
        $user = $this->user->findById($id); // You must implement this method in your model

        if (!$user) {
            die('User not found');
        }

        require base_path('app/views/edit.php');
        exit;
    }

    public function edit()
    {
        require base_path('app/views/edit.php');

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $data = [
                'name' => $_POST['name'],
                'username' => $_POST['username'],
                'password' => $_POST['password'],
            ];

            $this->user->edit($id, $data);

            header("Location: /users");
            exit;
        }
    }
}
