<?php

require_once __DIR__."/../vendor/autoload.php";

use app\Router;
use app\controllers\ProductsController;

$router = new Router();

// "/" Rout
$router->get('/', [new ProductsController(), 'index']);
$router->get('/products', [new ProductsController(), 'index']);

//Create Rout
$router->get('/products/create', [ new ProductsController(), 'create']);
$router->post('/products/create', [ new ProductsController(), 'create']);

//Update Rout
$router->get('/products/update', [new ProductsController(), 'update']);
$router->post('/products/update', [new ProductsController(), 'update']);

//delete
$router->post('/products/destroy', [new ProductsController(), 'destroy']);

$router->resolve();
