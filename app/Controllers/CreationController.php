<?php

namespace App\Controllers;

class CreationController extends Controller
{
	public function index(): void
	{
		$this->view = 'index';
	}
}