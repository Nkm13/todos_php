<?php
require_once("controller/home.php");
require_once("controller/todo.php");
require_once("errors/error.php");
require_once("router/router.php");

use Application\controller\Todo\TodoController;
use Application\controller\Home\HomeController;
use Application\errors\Error\Exception;

$uri = parse_url($_SERVER['REQUEST_URI'])["path"];
$regex = "#\d+#";
$match = [];
preg_match_all($regex, $uri, $match);
$id = $match[0][0];
$title = htmlspecialchars($_POST["title"]);
$content = htmlspecialchars($_POST["content"]);

try {
    $homeCtrl = new HomeController();
    $todoCtrl = new TodoController();
    $exception = new Exception();
    if ($uri == "/") {
        $homeCtrl->index();
    } elseif ($uri == "/add-todo" || $uri == "/add-todo/save") {
        $todoCtrl->add($title, $content);
    } elseif ($uri == "/todo/$id/edit" || $uri == "/todo/$id/save") {
        $todoCtrl->edit($id, $title, $content);
    } elseif ($uri == "/todo/$id/delete") {
        $todoCtrl->delete($id);
    } else {
        $exception->notFound();
    }
} catch (\Exception $e) {
    $exception->notFound($e->getMessage());
}
