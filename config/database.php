<?php

namespace Application\config\Database;

class DatabaseConnection
{
    public ?\PDO $database = null;
    public String $dbName;
    public String $password;
    public String $userName;

    public function __construct($dbName, $userName, $password)
    {
        $this->dbName = $dbName;
        $this->userName = $userName;
        $this->password = $password;
    }

    public function connect_database(): \PDO
    {

        if ($this->database == null) {
            $this->database = new \PDO('mysql:host=localhost;dbname=' .
                $this->dbName . ';charset=utf8', $this->userName, $this->password, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
        }
        return $this->database;
    }
}