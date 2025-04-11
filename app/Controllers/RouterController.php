<?php

namespace App\Controllers;

use App\Authenticator\Controllers\AuthenticatorController;
use App\Users\Models\UserManager;

class RouterController extends Controller
{
	protected TodoController $controller;
//	protected AuthenticatorController $controller;
	public function __construct()
	{
		parent::__construct();
	}

	public function index(array $url): void
	{
		$parsedUrl = $this->parseUrl($url);
		$userManager = new UserManager();
		$userManager->loadUser();

		$this->controller = new TodoController();
//		$this->controller = new AuthenticatorController();
		$this->controller->index($parsedUrl);
//
		$this->view = 'layout';
	}
}