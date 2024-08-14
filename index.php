<?php

use App\Controller\BookController;
use App\Core\Container;
use App\Core\Router;

require_once __DIR__.'/vendor/autoload.php';

$container = new Container();
$router = new Router();

$router->addRoute('/', [$container->get(BookController::class), 'index']);
$router->addRoute('/borrow/(\d+)', [$container->get(BookController::class), 'borrowBook']);
$router->addRoute('/return/(\d+)', [$container->get(BookController::class), 'returnBook']);

$router->dispatch($_SERVER['REQUEST_URI']);
