<?php

namespace app\models;

use core\Database;
use PDO;

class User
{
    private $db;

    public $existingUser;
    public $userPassword;
    public $username_exist = "";
    public $ordered_by = "";
    public $users = [];

    public function __construct()
    {
        $this->db = new Database();
    }

    public function all()
    {
        return $this->db->query("SELECT * FROM db")->fetchAll();
    }



    public function create($name, $username, $password)
    {
        $user = $this->existsByUsername($username);
        return $this->db->query(
            "INSERT INTO db (name_d, username_d, password_d) VALUES (:name, :username, :password)",
            [
                'name' => $name,
                'username' => $username,
                'password' => $password
            ]
        );
    }

    public function edit($id, $data)
    {
        return $this->db->query(
            "UPDATE db SET name_d = :name, username_d = :username, password_d = :password WHERE id_d = :id",
            [
                'id' => $id,
                'name' => $data['name'],
                'username' => $data['username'],
                'password' => $data['password']
            ]
        );
    }

    public function delete($id)
    {
        return $this->db->query("DELETE FROM db WHERE id_d = :id", ['id' => $id]);
    }

    public function existsByUsername($username)
    {
        return $this->db->query(
            "SELECT * FROM db WHERE username_d = :username",
            ['username' => $username]
        )->fetch();
    }


    public function checkPassword($username)
    {
        global $pdo;
        $checkQuery = "SELECT password_d FROM db WHERE username_d = ?";
        $stmt = $pdo->prepare($checkQuery);
        $stmt->execute([$username]);
        $this->userPassword = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function sort($column)
    {
        $allowed = ['id_d', 'name_d', 'username_d', 'password_d'];
        $sort = in_array($column, $allowed) ? $column : 'id_d';

        return $this->db->query("SELECT * FROM db ORDER BY {$sort} ASC")->fetchAll();
    }

    public function findById($id)
    {
        return $this->db->query(
            "SELECT * FROM db WHERE id_d = :id",
            ['id' => $id]
        )->fetch(); // Use fetch() to get a single user
    }

    public function getOrderColumn()
    {
        if (isset($_GET['sort'])) {
            if ($_GET['sort'] === 'name') return 'name_d';
            if ($_GET['sort'] === 'username') return 'username_d';
            if ($_GET['sort'] === 'id') return 'id_d';
        }
        return 'id_d';
    }

    public function searchAndSort($search, $column)
    {
        $allowed = ['id_d', 'name_d', 'username_d', 'password_d'];
        $sort = in_array($column, $allowed) ? $column : 'id_d';

        return $this->db->query(
            "SELECT * FROM db WHERE name_d LIKE :search OR username_d LIKE :search ORDER BY {$sort} ASC",
            ['search' => "%$search%"]
        )->fetchAll();
    }
}
