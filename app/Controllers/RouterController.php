<?php

namespace App\Controllers;

use App\Authenticator\Controllers\AuthenticatorController;
use App\Users\Models\UserManager;

class RouterController extends Controller
{
	protected TodoController $controller;
	protected AuthenticatorController $authenticatorController;

	public function __construct()
	{
		parent::__construct();
	}

	public function index(array $url): void
	{
		$parsedUrl = $this->parseUrl($url);
		$userManager = new UserManager();
		$userManager->loadUser();

		if ($parsedUrl === 'aministrace') {
			$this->authenticatorController = new AuthenticatorController();
			$this->authenticatorController->index($parsedUrl);
		} else {
			$this->controller = new TodoController();
			$this->controller->index($parsedUrl);
		}

		$this->view = 'layout';
	}
}