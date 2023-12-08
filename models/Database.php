<?php

class Database
{
    // dsn: database server hostname
    private $dsn = "mysql:host=localhost;dbname=task-management";
    private $username = "root";
    private $password = "";
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO($this->dsn, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $error)
        {
            echo "Connection error: " . $error->getMessage();
        }
    }

    public function query($sql, $params = null)
    {
        try {
            $query = $this->db->prepare($sql);

            $query->execute($params);

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $error)
        {
            echo "Error occured while executing the query: " . $error->getMessage();
        }
    }
}