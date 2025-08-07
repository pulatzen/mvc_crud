<?php

namespace app\controllers;

use app\models\User;

class RegisterController
{
    protected $user;
    public static string $userExist = '';

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        require base_path('app/views/register.php');
        exit();
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = $this->user->existsByUsername($username);

            if ($user) {
                $_SESSION['registerUsernameError'] = "Username already exist!";
                header("Location: /register");
                exit;
            }
            
            $this->user->create($name, $username, $password);
        
            // Success
            $_SESSION['user'] = ['name' => $name, 'username' => $username];
            header("Location: /users");
            exit;
        }

        header("Location: /register");
        exit;
    }
}
