<?php

use App\Controllers\RouterController;
use App\Models\Db;

require ('Autoloader.php');

Autoloader::register();

$db = new Db();
$db->connect("database", "test", "test", "todo_php_db");

$routerController = new RouterController();
$routerController->index();

$routerController->renderView();