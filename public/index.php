<?php
require_once("../controller/home.php");
require_once("../errors/error.php");
require_once("../router/router.php");

use Application\controller\Home\HomeController;
use Application\errors\Error\Exception;
use Application\router\Router\Router;

$request = $_SERVER['REQUEST_URI'];
$router = new Router();


$router->register("/", function () {
    return "home";
});

$router->register("/add-todo", function () {
    return "add-todo";
});
$d = $router->resolve($request);

echo $d;
try {
    $homeCtrl = new HomeController();
    $exception = new Exception();
    if ($request == "/") {
        $homeCtrl->execute();
    } elseif ($request == "/add-todo") {
        $homeCtrl->addTodo();
    } else {
        $errorMessage = "La page que vous cherchez n'existe pas";
        $exception->notFound($errorMessage);
    }
} catch (\Exception $e) {
    $exception->notFound($e->getMessage());
}
