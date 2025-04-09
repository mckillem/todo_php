<?php

namespace App\Controllers;

use App\Models\Todo;
use ReflectionClass;

class TodoController
{
	public function __construct(
		private string $view = "",
	)
	{}

	public function index(): void
	{
		var_dump($_GET);
		if (isset($_GET['id']) && $_GET['id'])
		{
			if ($_GET['action'] == 'delete')
			{
				$this->delete($_GET['id']);
			} elseif ($_GET['action'] == 'edit')
			{
				$this->addTodo($_GET['id']);
			}
		} else {
			$this->addTodo();
		}
		$this->view = 'index';

		$this->renderView();
	}

	public function getAllTodos(): bool|array
	{
		$todoManager = new Todo();

		return $todoManager->getAllTodos();
	}

	public function addTodo(?string $id = null): void
	{
		$todoManager = new Todo();

		if ($_POST) {
//			if ($id) {
				$todoManager->saveTodo($_POST);
//			}
		}
	}

	public function delete(string $id): void
	{
		$todoManager = new Todo();
		$todoManager->deleteTodo($id);
	}

//	public function update(string $id): void
//	{
//		$todoManager = new Todo();
//		$todoManager->updateTodo($id);
//	}

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