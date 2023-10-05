<?php

namespace Application\router\Router;

use Application\errors\error\Exception;

class Router
{
    private array $routes = [];
    public function register(string $path, callable $action): void
    {
        $this->routes[$path] = $action;
    }
    public function resolve(string $uri): mixed
    {
        $path = explode("?", $uri)[0];
        $action = $this->routes[$path] ?? null;
        if (!is_callable($action)) {
            (new Exception)->notFound();
        }
        return $action();
    }

    public function router(String $uri)
    {
        $routes = [
            "/" => "controller/home.php",
            "/add-todo" => "controller/add_todo.php",
        ];

        if (array_key_exists($uri, $routes)) {
            require $routes[$uri];
        } else {
            http_response_code(404);
            echo "error";
        }
    }
}
