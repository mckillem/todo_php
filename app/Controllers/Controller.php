<?php

namespace App\Controllers;

use App\Users\Models\UserManager;
use ReflectionClass;
use ReflectionMethod;

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
//			extract($this->pageData, EXTR_PREFIX_ALL, "");

			$reflect = new ReflectionClass(get_class($this));
			$path = str_replace('Controllers', 'Views', str_replace('\\', '/', $reflect->getNamespaceName()));
			$controllerName = str_replace('Controller', '', $reflect->getShortName());
			$path = '../a' . ltrim($path, 'A') . '/' . $controllerName . '/' . $this->view . '.phtml';

			require($path);
		}
	}

	public function redirect(string $url = ''): void
	{
		header("Location: /$url");
		header("Connection: close");
		exit;
	}

	public function userAuth(): void
	{
		$user = UserManager::$user;

		if (!$user) {
			$this->redirect('prihlaseni');
		}
	}

	public function callAction(string $parsedUrl)
	{
		$action = substr($parsedUrl, stripos($parsedUrl, '/') + 1);
		$method = new ReflectionMethod(get_class($this), $action);
		echo $method;
		return ;
	}
}