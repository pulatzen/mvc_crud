<?php

namespace core;

use PDO;
use PDOException;
class Database
{
    private $host = 'localhost';
    private $dbusername = 'root';
    private $dbpassword = 'yourpassword';
    private $dbname = 'qatiq';

    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        try {
            $this->pdo = new PDO($dsn, $this->dbusername, $this->dbpassword);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // show errors
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // fetch associative arrays
        } catch (PDOException $e) {
            die('DB connection failed: ' . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function pdo()
    {
        return $this->pdo;
    }
}





