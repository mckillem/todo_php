<?php

namespace App\Pages\Controllers;

use App\Controllers\Controller;
use App\Pages\Models\Page;

class PageController extends Controller
{
	public function index(array $parsedUrl): void
	{
		$page = new Page;
		$loadedPage = $page->loadPage($parsedUrl[0]);

		if (!$loadedPage)
			$this->redirect('chyba');

		$controller = 'App\\' . $loadedPage['controller'] . 'Controller';
		$controller = new $controller;
		array_shift($parsedUrl);
//		$controller->callAction($parsedUrl);
		$controller->index();

		$this->pageData['controller'] = $controller;
		$this->pageData['title'] = $loadedPage['title'];
		$this->pageData['content'] = $loadedPage['content'];

		$this->view = 'index';
	}

	public function getAllPages(): bool|array
	{
		$pageManager = new Page();

		return $pageManager->getAllPages();
	}
}