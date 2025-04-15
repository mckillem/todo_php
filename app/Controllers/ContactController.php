<?php

namespace App\Controllers;

class ContactController extends Controller
{
	public function index(): void
	{
		$this->view = 'index';
	}
}