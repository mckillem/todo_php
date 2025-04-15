<?php

namespace App\Controllers;

class Contact extends Controller
{
	public function index(): void
	{
		$this->view = 'index';
	}
}