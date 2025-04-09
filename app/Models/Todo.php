<?php

namespace app\Models;

use PDO;
use PDOException;

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
	public function saveTodo(array $todo): void
	{
		$servername = "database";
		$username = "test";
		$password = "test";
		$dbname = "todo_php_db";

		try {
			$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = $pdo->prepare(
				"insert into todo set
            text = :text"
			);
			$sql->execute(array(
				':text' => $todo['text']
			));

			echo "New record created successfully";
		} catch(PDOException $e) {
			echo "<br>" . $e->getMessage();
		}

//		if (!$id)
//			Db::insert('todo', $todo);
//		else
//			Db::update('todo', $todo, 'WHERE todo_id = ?', array($id));
	}

	public function deleteTodo(string $id): void
	{
		Db::query('DELETE FROM todo WHERE todo_id = ?', array($id));
	}
}