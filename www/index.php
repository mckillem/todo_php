<?php

use app\Models\Db;

require ('Autoloader.php');

Autoloader::register();

//$db = new Db();
//$db->connect("database", "test", "test", "todo_php_db");
Db::connect("database", "test", "test", "todo_php_db");
