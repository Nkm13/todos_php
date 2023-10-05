<?php

namespace Application\controller\Todo;

require_once("./config/database.php");
require_once("./model/home.php");
require_once("./model/todo.php");


use Application\src\Todo\TodoModel;
use Application\config\Database\DatabaseConnection;

class TodoController
{
    private TodoModel $todoModel;

    public function __construct()
    {
        $this->todoModel = new TodoModel();
        $this->todoModel->connection = new DatabaseConnection("todos_php", "root", "root");
    }
    public function add($title, $content)
    {
        if (isset($title) && isset($content) && !empty($content) && !empty($title)) {
            $this->todoModel->save($title, $content);
            return  header("Location: /");
        }
        require("./view/add_todo.php");
    }

    public function edit($id, $title, $content)
    {
        if (!$this->todoModel->isExistingTodo($id)) {
            return  header("Location: /");
        };
        $todo = $this->todoModel->isExistingTodo($id);
        if (!empty($content) && !empty($title) & !empty($id)) {
            $this->todoModel->edit($id, $title, $content);
            return  header("Location: /");
        }
        $oldContent = $todo["content"];
        $oldTitle  = $todo["title"];
        require("./view/edit_todo.php");
    }
    public function delete($id)
    {
        $this->todoModel->delete($id);
        return  header("Location: /");
    }
}