<?php

namespace App\Controllers;


class TodoController extends Controller
{
	public function index(array $parsedUrl) {
		$this->view = 'index';
	}
}