<?php

namespace app\controllers;

use app\models\User;

class CreateController
{
    protected $user;
    public static string $userExist = '';

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        require base_path('app/views/create.php');
        exit();
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->user->existsByUsername($username);

            if ($user) {
                $_SESSION['createUsernameError'] = "Username already exist!";
                header("Location: /create");
                exit;
            }
            
            $this->user->create($name, $username, $password);
        
            // Success
            $_SESSION['user'] = ['name' => $name, 'username' => $username];
            header("Location: /users");
            exit;
        }

        header("Location: /create");
        exit;
    }
}