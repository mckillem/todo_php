<?php

use App\Controllers\RouterController;
use App\Models\Db;

require ('Autoloader.php');

Autoloader::register();

session_start();

$db = new Db();
$db->connect("database", "test", "test", "todo_php_db");

$routerController = new RouterController();
$routerController->index(array($_SERVER['REQUEST_URI']));

$routerController->renderView();