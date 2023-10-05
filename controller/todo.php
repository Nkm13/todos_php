<?php

namespace Application\controller\Todo;

require_once("./config/database.php");
require_once("./model/home.php");
require_once("./model/todo.php");


use Application\src\Todo\TodoModel;
use Application\config\Database\DatabaseConnection;

class TodoController
{
    public DatabaseConnection $connection;
    public function add($title, $content)
    {
        if (isset($title) && isset($content) && !empty($content) && !empty($title)) {
            $todoModel = new TodoModel();
            $todoModel->connection = new DatabaseConnection("todos_php", "root", "root");
            $todoModel->save($title, $content);
            return  header("Location: /");
        }
        require("./view/add_todo.php");
    }

    public function edit($id, $title, $content)
    {
        $todoModel = new TodoModel();
        $todoModel->connection = new DatabaseConnection("todos_php", "root", "root");
        if (!$todoModel->isExistingTodo($id)) {
            return  header("Location: /");
        };
        $todo = $todoModel->isExistingTodo($id);
        $oldContent = $todo["content"];
        $oldTitle  = $todo["title"];
        if (!empty($content) && !empty($title) & !empty($id)) {
            $todoModel->edit($id, $title, $content);
            return  header("Location: /");
        }
        require("./view/edit_todo.php");
    }
    public function delete($id)
    {
        $todoModel = new TodoModel();
        $todoModel->connection = new DatabaseConnection("todos_php", "root", "root");
        $todoModel->delete($id);
        return  header("Location: /");
    }
}
