<?php

namespace App\Controllers;

use App\Users\Models\UserManager;
use Exception;
use ReflectionClass;
use ReflectionException;
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

	public function callAction(array $parsedUrl): void
	{
		$action = $parsedUrl ? array_shift($parsedUrl) : 'index';
		$action = str_replace('odhlasit', 'logout', $action);
		try
		{
			$method = new ReflectionMethod(get_class($this), $action);
		}
		catch (ReflectionException $exception)
		{
			$this->throwRoutingException("Neplatná akce - $action");
		}
		$phpDoc = $method->getDocComment();
		$annotation = '@Action';
//		if (mb_strpos($phpDoc, $annotation) === false)
//			$this->throwRoutingException("Neplatná akce - $action");

		$requiredParamsCount = $method->getNumberOfRequiredParameters();
		if (count($parsedUrl) < $requiredParamsCount)
			$this->throwRoutingException("Akci nebyly předány potřebné parametry ($requiredParamsCount)");

		$method->invokeArgs($this, $parsedUrl);
	}

	private function throwRoutingException(string $message): void
	{
//		if (Settings::$debug)
			throw new Exception($message);
//		else
//			$this->redirect('chyba');
	}
}