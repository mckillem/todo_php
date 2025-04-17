<?php

namespace App\Controllers;

class ContactController extends Controller
{
	public function index(): void
	{
//		var_dump($_POST ?? 'prazdno');
		if (isset($_POST))
			$this->sendEmail($_POST['email'], $_POST['text']);
		$this->view = 'index';
	}

	private function sendEmail(string $email, string $text): void
	{
		$to      = 'mckillem@tuta.io';
		$subject = 'Email z webu';
		$message = $text;
		$headers = 'From: ' . $email . "\n" .
			'Reply-To: ' . $email . "\n" .
			'X-Mailer: PHP/' . phpversion();

		$success = mail($to, $subject, $message, $headers);
		var_dump($success);
		if (!$success) {
			$errorMessage = error_get_last()['message'];
			var_dump($errorMessage);
		}
	}
}