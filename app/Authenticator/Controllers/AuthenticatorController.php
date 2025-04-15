<?php

namespace App\Authenticator\Controllers;

use App\Controllers\Controller;

class AuthenticatorController extends Controller
{
	public function index(): void
	{
		$this->userAuth();

		$this->view = 'index';
	}

	/**
	 * @Action
	 */
	public function logout(): void
	{
		session_destroy();
		$this->redirect('prihlaseni');
	}
}