<?php

namespace App\Controllers;


class TodoController extends Controller
{
	public function index(array $parsedUrl): void
	{
		$this->view = 'index';
	}

	private function getAllTodos()
	{

	}
}