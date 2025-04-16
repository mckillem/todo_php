<?php

namespace App\Pages\Controllers;

use App\Controllers\Controller;
use App\Pages\Models\Page;

class PageListController extends Controller
{
	public function index(): void
	{
		$pages = new Page();
		$this->pageData['pages'] = $pages->getAllPages();

		$this->view = 'index';
	}
}