<?php

namespace App\Pages\Controllers;

use App\Controllers\Controller;
use App\Pages\Models\Page;

class PageController extends Controller
{
	public function index(string $parsedUrl): void
	{
		$page = new Page;
		$loadedPage = $page->loadPage($parsedUrl);

		if (!$loadedPage)
			$this->redirect('chyba');

		$controller = 'App\\' . $loadedPage['controller'];
		$controller = new $controller;
		$controller->index();

		$this->pageData['controller'] = $controller;
		$this->pageData['title'] = $loadedPage['title'];
		$this->pageData['content'] = $loadedPage['content'];

		$this->view = 'index';
	}
}