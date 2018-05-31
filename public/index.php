<?php

use \polakjan\mvc\routing\getControllerFromUrl as the_function_that_gets_the_controller_name;

// BOOTSTRAPPING
// include / require all the necessary files
require_once '../config/app.php';
require_once '../vendor/polakjan/mvc/routing.php';
require_once '../vendor/polakjan/mvc/db.php';
require_once '../app/Product.php';

// ROUTING
// http://www.eshop.test - handle by homepage controller
// http://www.eshop.test?page=category - handle by category controller
// http://www.eshop.test?page=product - handle by product controller
$controller_name = \polakjan\mvc\routing\getControllerFromUrl();

// figure out the controller class, e.g. 'IndexController' from 'index'
$controller_class = ucfirst(strtolower($controller_name)) . 'Controller';

// require the controller file
// e.g. '../app/Http/controllers/IndexController.php'
require '../app/Http/controllers/' . $controller_class . '.php';

// add the namespace to the controller class
// making it e.g. \app\Http\controllers\IndexController
$controller_class = '\\app\\Http\\controllers\\' . $controller_class;

// create a controller object
// equivalent to $controller = new \app\Http\controllers\IndexController();
$controller = new $controller_class();

// run the controller
$controller->index();