<?php

namespace App\Controllers;

use App\Pages\Controllers\PageController;
use App\Users\Models\UserManager;

class RouterController extends Controller
{
	protected PageController $controller;

	public function __construct()
	{
		parent::__construct();
	}

	public function index(array $url): void
	{
		$parsedUrl = $this->parseUrl($url[0]);
		$userManager = new UserManager();
		$userManager->loadUser();

		if (empty($parsedUrl[0]))
			$parsedUrl[0] = 'uvod';

		$this->controller = new PageController();
		$this->controller->index($parsedUrl);

		$this->pageData['pages'] = $this->controller->getAllPages();

		$this->view = 'layout';
	}

	public function parseUrl(string $url): array
	{
		$path = ltrim(parse_url($url)['path'], '/');

		return explode("/", $path);
	}
}