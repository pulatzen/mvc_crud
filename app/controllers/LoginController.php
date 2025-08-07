<?php

namespace app\controllers;

use app\models\User;

class LoginController
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        require base_path('app/views/login.php');
        exit();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->user->existsByUsername($username);

            if (!$user) {
                $_SESSION['loginUsernameError'] = "Username does not exist!";
                header("Location: /");
                exit;
            }

            if ($user['password_d'] !== $password) {
                $_SESSION['loginPasswordError'] = "Incorrect password!";
                header("Location: /");
                exit;
            }

            // Success
            $_SESSION['user'] = $user;
            header("Location: /users");
            exit;
        }

        header("Location: /login");
        exit;
    }
}
