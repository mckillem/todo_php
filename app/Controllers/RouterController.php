<?php

namespace App\Controllers;

use App\Pages\Controllers\PageController;
use App\Users\Models\UserManager;

class RouterController extends Controller
{
	protected PageController $controller;

	public function __construct()
	{
		parent::__construct();
	}

	public function index(array $url): void
	{
		$parsedUrl = $this->parseUrl($url[0]);
		$userManager = new UserManager();
		$userManager->loadUser();

		$this->controller = new PageController();
		$this->controller->index($parsedUrl);

		$this->pageData['pages'] = $this->controller->getAllPages();

		$this->view = 'layout';
	}

	public function parseUrl(string $url): array
	{
//		echo urldecode(http_build_query($url));
//		echo str_replace('/', '', parse_url($url[0])['path']);
		$path = ltrim(parse_url($url)['path'], '/');
//		echo $path;
//		$path = rtrim($path, '/');
		$path = explode('/', $path);
//		echo substr_replace($path, '', stripos($path, '/'));
//		echo substr($path, stripos($path, '/') + 1);
//		$action = substr($path, stripos($path, '/') + 1);
//		echo $action;
//		$method = new ReflectionMethod(get_class($this), $action);
//		var_dump($path);
//		return $path;

		// Naparsuje jednotlivé části URL adresy do asociativního pole
		$parsedUrl = parse_url($url);
		// Odstranění počátečního lomítka
		$parsedUrl["path"] = ltrim($parsedUrl["path"], "/");
		// Odstranění bílých znaků kolem adresy
		$parsedUrl["path"] = trim($parsedUrl["path"]);
//var_dump(explode("/", $parsedUrl["path"])
//);		// Rozbití řetězce podle lomítek
		return explode("/", $parsedUrl["path"]);
	}
}