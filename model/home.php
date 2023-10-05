<?php

namespace Application\src\Home;

use Application\config\Database\DatabaseConnection;

class HomeModel
{
    public DatabaseConnection $connection;

    public function index(): array
    {
        $allTodos = [];
        $request = $this->connection->connect_database()->prepare("SELECT id ,title,content,DATE_FORMAT(date_added, '%d/%m/%Y à %Hh%imin') AS date_formated FROM todos ORDER BY id DESC");
        $request->execute();
        $allTodos = $request->fetchAll();
        return $allTodos;
    }
}