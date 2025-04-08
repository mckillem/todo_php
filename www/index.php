<?php

use App\Controllers\RouterController;

function autoloader($class): void
{
	if (mb_strpos($class, 'App\\') !== false)
		$class = 'a' . ltrim($class, 'A');
	$path = str_replace('\\', '/', $class) . '.php';
	if (file_exists('../' . $path))
		include('../' . $path);
}

spl_autoload_register("autoloader");

$router = new RouterController();
$router->index(array($_SERVER['REQUEST_URI']));

$router->renderView();