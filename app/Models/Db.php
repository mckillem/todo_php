<?php

namespace app\Models;

use PDO;

class Db
{
	private static PDO $connection;

	private static array $settings = array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
		PDO::ATTR_EMULATE_PREPARES => false,
	);

	public static function connect(#[\SensitiveParameter] string $host, #[\SensitiveParameter] string $user, #[\SensitiveParameter] string $password, string $database): void
	{
		if (!isset(self::$connection)) {
			self::$connection = @new PDO(
				"mysql:host=$host;dbname=$database",
				$user,
				$password,
				self::$settings
			);
		}
	}

	public static function queryAll(string $query, array $parameters = array()): array|bool
	{
		$statement = self::$connection->prepare($query);
		$statement->execute($parameters);

		return $statement->fetchAll(self::$connection::FETCH_CLASS);
//		return $statement->fetchAll();
	}

	public static function query(string $query, array $parameters = array()): int
	{
		$statement = self::$connection->prepare($query);
		$statement->execute($parameters);

		return $statement->rowCount();
	}

	public static function insert(string $table, array $parameters = array()): bool
	{
		return self::query("INSERT INTO `$table` (`" .
			implode('`, `', array_keys($parameters)) .
			"`) VALUES (" . str_repeat('?,', sizeOf($parameters) - 1) . "?)",
			array_values($parameters));
	}
}