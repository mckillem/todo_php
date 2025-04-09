<?php

namespace App\Controllers;

use app\Models\Todo;
use ReflectionClass;

class TodoController
{
	public function __construct(
		private string $view = "",
	)
	{}

	public function index(): void
	{
		$this->addTodo();
		$this->view = 'index';

		$this->renderView();
	}

	public function getAllTodos(): bool|array
	{
		$todoManager = new Todo();

		return $todoManager->getAllTodos();
	}

	public function addTodo(): void
	{
		if ($_POST) {
			$todoManager = new Todo();
			$todoManager->saveTodo($_POST);
		}
	}

	public function deleteTodo(string $id): void
	{
		$todoManager = new Todo();
		$todoManager->deleteTodo($id);
	}

	public function renderView(): void
	{
		if ($this->view) {
			$reflect = new ReflectionClass(get_class($this));
			$path = str_replace('Controllers', 'Views', str_replace('\\', '/', $reflect->getNamespaceName()));
			$controllerName = str_replace('Controller', '', $reflect->getShortName());
			$path = '../a' . ltrim($path, 'A') . '/' . $controllerName . '/' . $this->view . '.phtml';

			require($path);
		}
	}
}