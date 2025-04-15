<?php

namespace App\Controllers;

use ReflectionClass;

class Controller
{
	public function __construct(
		protected string $view = "",
		public string $title = 'Úkolovník',
		protected array $pageData = []
	){}

	public function renderView(): void
	{
		if ($this->view)
		{
			extract($this->pageData);

			$reflect = new ReflectionClass(get_class($this));
			$path = str_replace('Controllers', 'Views', str_replace('\\', '/', $reflect->getNamespaceName()));
			$controllerName = str_replace('Controller', '', $reflect->getShortName());
			$path = '../a' . ltrim($path, 'A') . '/' . $controllerName . '/' . $this->view . '.phtml';

			require($path);
		}
	}

	public function parseUrl(array $url): array|string
	{
		return str_replace('/', '', parse_url($url[0])['path']);
	}

	public function redirect(string $url = ''): void
	{
		header("Location: /$url");
		header("Connection: close");
		exit;
	}
}