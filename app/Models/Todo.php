<?php

namespace app\Models;

class Todo
{
	public function getAllTodos(): bool|array
	{
		return Db::queryAll('
			SELECT `todo_id`, `text`
			FROM `todo`
			ORDER BY `todo_id` DESC
		');
	}

//	public function saveTodo(int|bool $id, array $todo): void
	public function saveTodo(int|bool $id, array $todo): void
	{
//		if (!$id)
			Db::insert('todo', $todo);
//		else
//			Db::update('todo', $todo, 'WHERE todo_id = ?', array($id));
	}
}