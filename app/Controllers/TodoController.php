<?php

namespace App\Controllers;

use App\Models\Db;
use App\Models\Todo;
use ReflectionClass;

class TodoController
{
	public function __construct(
		private string $view = "",
		public array $todo = []
	)
	{}

	public function index(): void
	{
		if (isset($_GET['id']) && $_GET['id'])
		{
			if ($_GET['action'] == 'delete')
			{
				$this->delete($_GET['id']);
			} elseif ($_GET['action'] == 'edit')
			{
				$this->todo = Db::getTodoById($_GET['id']);
				$this->addTodo();
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
		$this->view = 'edit';
		$this->renderView();

		$todoManager = new Todo();

		if ($_POST) {
//			if ($id) {
				$todoManager->saveTodo($_POST);
//			header("Location: /");
//			header("Connection: close");
//			exit;
//			}
		}
	}

	public function delete(string $id): void
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