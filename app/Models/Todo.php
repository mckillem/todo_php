<?php

namespace App\Models;

class Todo
{
	public function getAllTodos(): bool|array
	{
		$db = new Db();

		return $db->getAllTodos();
	}

	public function saveTodo(array $todo): void
	{
		$id = $todo['todo_id'];
		$db = new Db();

		if (!$todo['todo_id'])
			$db->saveTodo($todo);
		else
			$db->saveTodo($todo, $id);
	}

	public function deleteTodo(string $id): void
	{
		$db = new Db();
		$db->deleteTodo($id);
	}
}