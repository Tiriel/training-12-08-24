<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function addRoute(string $path, callable $callback): void
    {
        $this->routes[$path] = $callback;
    }

    public function dispatch(string $uri): void
    {
        foreach ($this->routes as $path => $callback) {
            $path = str_replace('/', '\/', $path);

            if (\preg_match("#^$path$#", $uri, $matches)) {
                var_dump($callback);
                \array_shift($matches);
                call_user_func($callback, ...$matches);

                return;
            }
        }

        http_response_code(404);
        echo "Page not found.";
    }
}
