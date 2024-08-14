<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function addRoute(string $path, callable $callback): void
    {

    }

    public function dispatch(string $uri): void
    {
        http_response_code(404);
        echo "Page not found.";
    }
}
