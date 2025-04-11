<?php

namespace App\Controllers;

use App\Models\Db;
use App\Models\Todo;

class TodoController extends Controller
{
	public function __construct(
		public array $todo = []
	){
		parent::__construct();
	}

	public function index(string $parsedUrl): void
	{
		if (isset($_GET['id']) && $_GET['id'])
		{
			if ($_GET['action'] == 'delete')
			{
				$this->delete($_GET['id']);
			} elseif ($_GET['action'] == 'edit')
			{
				$this->todo = Db::getTodoById($_GET['id']);
				$this->addTodo($parsedUrl);
			}
		} else
		{
			$this->addTodo($parsedUrl);
		}

		if ($parsedUrl == '')
		{
			$this->view = 'index';
		}
	}

	public function getAllTodos(): bool|array
	{
		$todoManager = new Todo();

		return $todoManager->getAllTodos();
	}

	public function addTodo(string $parsedUrl): void
	{
		if ($parsedUrl == 'edit') {
			$this->view = 'edit';
		}

		$todoManager = new Todo();

		if ($_POST) {
			$todoManager->saveTodo($_POST);
			$this->view = 'index';

			$this->redirect('');
		}
	}

	public function delete(string $id): void
	{
		$todoManager = new Todo();
		$todoManager->deleteTodo($id);
	}
}