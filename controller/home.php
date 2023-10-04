<?php

namespace Application\controller\Home;

require_once("../config/database.php");
require_once("../src/home.php");


use Application\src\Home\HomeModel;
use Application\config\Database\DatabaseConnection;

class HomeController
{
    function execute()
    {
        $home = new HomeModel();
        $home->connection = new DatabaseConnection("todos_php", "root", "root");
        $todos = $home->getTodos();
        require("../view/home.php");
    }

    function addTodo()
    {
        require("../view/add_todo.php");
    }
}
