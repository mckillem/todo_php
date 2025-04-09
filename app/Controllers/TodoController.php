<?php

namespace App\Controllers;

use app\Models\Todo;

class TodoController extends Controller
{
	public function __construct(
//		string $view = "",
//		array $data = array(),
	)
	{
//		parent::__construct($view, $data);
	}

	public function index(array $parsedUrl): void
	{
		$this->addTodo();
		$this->view = 'index';
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

//			$this->data['todo'] = $todo;
//		$this->presenter = 'editor';
		}
	}
}