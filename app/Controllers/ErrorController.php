<?php

namespace App\Controllers;

class ErrorController extends Controller
{
	public function index(): void
	{
		header("HTTP/1.0 404 Not Found");
	}
}