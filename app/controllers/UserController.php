<?php

namespace app\controllers;

use app\models\User;
use PDO;

class UserController
{
    protected $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        require base_path('app/views/users.php');
        exit;
    }

    public function show()
    {
        $ordered_by = $this->user->getOrderColumn();

        $search = $_GET['search'] ?? '';

        if ($search !== '') {
            $users = $this->user->searchAndSort($search, $ordered_by);
        } else {
            $users = $this->user->sort($ordered_by);
        }

        require base_path('app/views/users.php'); // Pass $users to the view
    }
}
