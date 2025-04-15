<?php

namespace App\Controllers;

class Error extends Controller
{
	public function index(): void
	{
		header("HTTP/1.0 404 Not Found");
	}
}