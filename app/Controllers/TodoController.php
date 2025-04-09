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
		$todo = array(
			'todo_id' => '',
			'text' => ''
		);

		if ($_POST) {
			$keys = array('text');
			$todo = array_intersect_key($_POST, array_flip($keys));

			$todoManager = new Todo();

			$todoManager->saveTodo($_POST['todo_id'], $todo);
		}
	}

	public function renderView(): void
	{
		if ($this->view) {
			// Nemůžeme použít funkci pro zjištění namespace protože by vrátila ten abstraktního kontroleru
			$reflect = new ReflectionClass(get_class($this));

			$path = str_replace('Controllers', 'Views', str_replace('\\', '/', $reflect->getNamespaceName()));
			$controllerName = str_replace('Controller', '', $reflect->getShortName());
			$path = '../a' . ltrim($path, 'A') . '/' . $controllerName . '/' . $this->view . '.phtml';

			require($path);
		}
	}
}