<?php

namespace App\Controllers;

class ContactController extends Controller
{
	public function index(): void
	{
		if ($_POST)
		{
			if (isset($_POST['email']) && $_POST['email'] && isset($_POST['text']) && $_POST['text'])
				$this->sendEmail($_POST['email'], $_POST['text']);
		} else {
			echo "Formulář není správně vyplněn.";
		}

		$this->view = 'index';
	}

	private function sendEmail(string $email, string $text): void
	{
		$from = 'mckillem23@gmail.com';
		ini_set("SMTP", "smtp.gmail.com");
		ini_set("sendmail_from", $from);
		ini_set("smtp_port", "25");

		$to      = 'mckillem@tuta.io';
		$subject = 'Email z webu';
		$message = $text;
		$headers = 'From: ' . $email . "\n" .
			'Reply-To: ' . $email . "\n" .
			'X-Mailer: PHP/' . phpversion();

		$success = mb_send_mail($to, $subject, $message, $headers);

		if (!$success) {
			$errorMessage = error_get_last()['message'];
			echo "Email se nepodařilo odeslat.";
		} else {
			echo "Email byl odeslán.";
		}
	}
}