<?php

use App\Controllers\TodoController;
use App\Models\Db;

require ('Autoloader.php');

Autoloader::register();

$db = new Db();
$db->connect("database", "test", "test", "todo_php_db");

$todoController = new TodoController();
$todoController->index();
