<?php

namespace Application\src\Todo;

use Application\config\Database\DatabaseConnection;

class TodoModel
{
    public DatabaseConnection $connection;

    public function save($title, $content): string
    {
        $request = $this->connection->connect_database()->prepare("INSERT INTO todos(title,content,date_added) VALUES(:title,:content,:date_added)");
        $request->execute([
            'title' => $title,
            'content' => $content,
            'date_added' => (new \DateTime())->format('Y-m-d H:i:s'),
        ]);
        return 'Le todo a bien été ajouté !';
    }

    public function edit($id, $title, $content)
    {
        $request = $this->connection->connect_database()->prepare("UPDATE todos SET title=:title,content=:content,date_added=:date_added WHERE id=:id");
        $request->execute([
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'date_added' => (new \DateTime())->format('Y-m-d H:i:s'),
        ]);
        return 'Le todo a bien été modifié !';
    }

    public function delete($id)
    {
        $request = $this->connection->connect_database()->prepare("DELETE FROM todos WHERE id=:id");
        $request->execute([
            'id' => $id
        ]);
        return 'Le todo a bien été supprimé !';
    }

    public function isExistingTodo($id)
    {
        $request = $this->connection->connect_database()->prepare("SELECT id ,title,content,DATE_FORMAT(date_added, '%d/%m/%Y à %Hh%imin') AS date_formated FROM todos WHERE id=:id");
        $request->execute([
            'id' => $id
        ]);
        return $request->fetch();
    }
}
