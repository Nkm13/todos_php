<?php

namespace Application\controller\Home;

require_once("./config/database.php");
require_once("./model/home.php");


use Application\src\Home\HomeModel;
use Application\config\Database\DatabaseConnection;

class HomeController
{
    private HomeModel  $homeModel;
    public function __construct()
    {
        $this->homeModel = new HomeModel();
        $this->homeModel->connection = new DatabaseConnection("todos_php", "root", "root");
    }
    public function index()
    {
        $allTodos = $this->homeModel->index();
        require("./view/home.php");
    }
}