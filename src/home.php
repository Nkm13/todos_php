<?php

namespace Application\src\Home;

use Application\config\Database\DatabaseConnection;

class HomeModel
{
    public DatabaseConnection $connection;

    public function getTodos(): array
    {
        $todos = [];
        $request = $this->connection->connect_database()->prepare("SELECT id ,title,content,DATE_FORMAT(date_added, '%d/%m/%Y à %Hh%imin') AS date_formated FROM todos ORDER BY date_formated desc");
        $request->execute();
        $todos = $request->fetchAll();
        return $todos;
    }
}
