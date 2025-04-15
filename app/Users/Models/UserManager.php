<?php

namespace App\Users\Models;

class UserManager
{
	public static ?array $user;

	public function loadUser(): void
	{
		self::$user = $_SESSION['user'] ?? null;
	}

	public function login(string $email, string $password): void
	{
		if ($email == 'm@m.cz' || $password == 'mm') {
			$user = [['email' => $email, 'password' => $password]];
			$_SESSION['user'] = $user;
		}
	}
}