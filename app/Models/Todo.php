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
		$db->saveTodo($todo);

//		if (!$id)
//			Db::insert('todo', $todo);
//		else
//			Db::update('todo', $todo, 'WHERE todo_id = ?', array($id));
	}

	public function deleteTodo(string $id): void
	{
		$db = new Db();
		$db->deleteTodo($id);
	}
}