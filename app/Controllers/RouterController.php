<?php

namespace App\Controllers;

class RouterController extends Controller
{
	protected Controller $controller;

	public function __construct(
		string $view = "",
		array $data = array())
	{
		parent::__construct($view, $data);
	}

	public function index(array $parameters): void
	{
		$parsedUrl = $this->parseUrl($parameters[0]);

//		var_dump($parsedUrl);
//		$this->controller = $parsedUrl["controller"];
		$this->controller = new TodoController();

		$this->controller->index($parsedUrl);

		$this->view = 'layout';
	}

	private function parseURL(string $url): array
	{
		$parsedURL = parse_url($url);
		$parsedURL["path"] = ltrim($parsedURL["path"], "/");
		$parsedURL["path"] = trim($parsedURL["path"]);

		return explode("/", $parsedURL["path"]);
	}
}