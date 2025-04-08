<?php

namespace App\Controllers;

use ReflectionClass;

abstract class Controller
{
	public function __construct(
		protected string $view = "",
		protected array $data = array()
	){}

	public function renderView(): void
	{
		if ($this->view)
		{
			extract($this->data, EXTR_PREFIX_ALL, "");

			// Nemůžeme použít funkci pro zjištění namespace protože by vrátila ten abstraktního kontroleru
			$reflect = new ReflectionClass(get_class($this));

			$path = str_replace('Controllers', 'Views', str_replace('\\', '/', $reflect->getNamespaceName()));
			$controllerName = str_replace('Controller', '', $reflect->getShortName());
			$path = '../a' . ltrim($path, 'A') . '/' . $controllerName . '/' . $this->view . '.phtml';

			require($path);
		}
	}
}