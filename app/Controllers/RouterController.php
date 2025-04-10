<?php

namespace App\Controllers;

class RouterController extends Controller
{
	protected TodoController $controller;
	public function __construct()
	{
		parent::__construct();
	}

	public function index(): void
	{
		$this->controller = new TodoController();
		$this->controller->index();

		$this->view = 'layout';
	}
}