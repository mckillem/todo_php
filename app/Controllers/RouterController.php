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
		$parsedUrl = $this->parseUrl($url);
		$userManager = new UserManager();
		$userManager->loadUser();

		$this->controller = new PageController();
		$this->controller->index($parsedUrl);

		$this->view = 'layout';
	}
}