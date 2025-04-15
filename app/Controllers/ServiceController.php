<?php

namespace App\Controllers;

class ServiceController extends Controller
{
	public function index(): void
	{
		$this->view = 'index';
	}
}