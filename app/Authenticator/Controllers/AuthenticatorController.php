<?php

namespace App\Authenticator\Controllers;

use App\Controllers\Controller;
use App\Users\Models\UserManager;

class AuthenticatorController extends Controller
{
	public function index(): void
	{
//		var_dump($_GET);

		if (UserManager::$user)
		{
			$this->redirect('administrace');
		}



		if (isset($_GET['isLoggedIn']) && $_GET['isLoggedIn'])
		{
			$userManager = new UserManager();
			$userManager->login();

			$this->redirect('');
		}

		$this->view = 'index';
	}
}