<?php

use App\Controller\BookController;
use App\Core\Container;
use App\Core\Router;

require_once __DIR__.'/vendor/autoload.php';
$books = include __DIR__.'/fixtures.php';

$container = new Container();
$router = new Router();

$router->addRoute('/', [$container->get(BookController::class), 'index']);
$router->addRoute('/borrow/(\d+)', [$container->get(BookController::class), 'borrowBook']);
$router->addRoute('/return/(\d+)', [$container->get(BookController::class), 'returnBook']);

$connection = $container->get(App\Database\Connection\Connection::class);
foreach ($books as $book) {
    $connection->insert($book);
}

$router->dispatch($_SERVER['REQUEST_URI']);
