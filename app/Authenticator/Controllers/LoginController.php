<?php

namespace App\Authenticator\Controllers;

use App\Controllers\Controller;
use App\Users\Models\UserManager;

class LoginController extends Controller
{
	public function index(): void
	{
		if (UserManager::$user)
		{
			$this->redirect('administrace');
		}

		if (!empty($_POST) && $_POST['email'] != '' && $_POST['password'] != '')
		{
			$userManager = new UserManager();
			$userManager->login($_POST['email'], $_POST['password']);

			$this->redirect('administrace');
		}

		$this->view = 'index';
	}
}