<?php

namespace core;

class Router
{
    protected array $routes = [];

    public function get(string $uri, string $controllerAction): void
    {
        $this->addRoute('GET', $uri, $controllerAction);
    }

    public function post(string $uri, string $controllerAction): void
    {
        $this->addRoute('POST', $uri, $controllerAction);
    }

    public function addRoute(string $method, string $uri, string $controllerAction): void
    {
        $this->routes[$method][$uri] = $controllerAction;
    }

    public function dispatch(string $uri, string $method): void
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';

        if (!isset($this->routes[$method][$uri])) {
            http_response_code(404);
            echo "404 - Route not found";
            exit;
        }

        [$controllerName, $action] = explode('@', $this->routes[$method][$uri]);

        $controllerClass = 'app\\controllers\\' . $controllerName; 

        if (!class_exists($controllerClass)) {
            throw new \Exception("Controller '$controllerClass' not found");
        }

        $controller = new $controllerClass();

        if (!method_exists($controller, $action)) {
            throw new \Exception("Method '$action' not found in controller '$controllerClass'");
        }

        call_user_func([$controller, $action]);
    }
}
