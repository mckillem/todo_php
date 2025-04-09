<?php

namespace App\Models;

class Todo
{
	public function getAllTodos(): bool|array
	{
		$db = new Db();

		return $db->getAllTodos();
	}

//	public function saveTodo(int|bool $id, array $todo): void
	public function saveTodo(array $todo): void
	{
		$db = new Db();

		if (!$todo['todo_id'])
			$db->saveTodo($todo);
		else
			$db->saveTodo($todo, $todo['todo_id']);
	}

	public function deleteTodo(string $id): void
	{
		$db = new Db();
		$db->deleteTodo($id);
	}
}