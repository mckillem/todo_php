<?php

namespace App\Users\Models;

class UserManager
{
	public static ?array $user;

	public function loadUser(): void
	{
//		echo self::$user = $_SESSION['user'] ?? null;
		self::$user = $_SESSION['user'] ?? null;
	}

	public function login(): void
	{
		$user = [['email' => 'emil']];

		$_SESSION['user'] = $user;
	}
}