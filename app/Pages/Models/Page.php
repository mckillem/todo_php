<?php

namespace App\Pages\Models;

use App\Models\Db;

class Page
{

	public function loadPage(string $parsedUrl): array|false
	{
		$db = new Db();

		return $db->getPageByUrl($parsedUrl);
	}

	public function getAllPages(): array|false
	{
		$db = new Db();

		return $db->getAllPages();
	}
}