<?php
class Database
{
    private $pdo;

    function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $sql_host = "localhost";
        $sql_db = "sim-game";
        $sql_username = "root";
        $sql_password = "";

        $dsn = "mysql:dbname=$sql_db;host=$sql_host;charset=utf8mb4;port=3306";

        try {
            $this->pdo = new PDO($dsn, $sql_username, $sql_password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    function login($username, $password)
    {
        $passwordMd5 = md5($password);
        $template = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$passwordMd5'";
        $sth = $this->pdo->prepare($template);
        $sth->execute();

        $data = $sth->fetch(PDO::FETCH_ASSOC);

        return $data;
    }

    function getInventory()
    {
        $template = "SELECT * FROM `inventory`";
        $sth = $this->pdo->prepare($template);
        $sth->execute();

        $data = $sth->fetchAll(PDO::FETCH_ASSOC);

        $data["size"] = sizeof($data);

        return $data;
    }
}
