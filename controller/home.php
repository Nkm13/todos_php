<?php

namespace Application\controller\Home;

require_once("./config/database.php");
require_once("./model/home.php");


use Application\src\Home\HomeModel;
use Application\config\Database\DatabaseConnection;

class HomeController
{
    public function index()
    {
        $homeModel = new HomeModel();
        $homeModel->connection = new DatabaseConnection("todos_php", "root", "root");
        $allTodos = $homeModel->index();
        require("./view/home.php");
    }
}
