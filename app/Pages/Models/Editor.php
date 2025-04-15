<?php

namespace App\Pages\Models;

use App\Models\Db;

class Editor
{
	public function save(array $data, ?string $page_id = null): void
	{
		$db = new DB();

		$db->save($data, $page_id);
	}
}