<?php

use App\Controllers\TodoController;
use app\Models\Db;

require ('Autoloader.php');

Autoloader::register();

Db::connect("database", "test", "test", "todo_php_db");

$todoController = new TodoController();
$todoController->index();
