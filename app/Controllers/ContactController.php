<?php

namespace App\Controllers;

use DateTime;

class ContactController extends Controller
{
	public function index(): void
	{
		$this->pageData['email'] = $_POST['email'] ?? '';
		$this->pageData['text'] = $_POST['text'] ?? '';

		if ($_POST)
		{
			if (isset($_POST['email'], $_POST['text'], $_POST['year']) && $_POST['email'] && $_POST['text'] && $_POST['year'] === new DateTime()->format('Y'))
			{
				$this->sendEmail($_POST['email'], $_POST['text']);
			}
			else
			{
				echo "Špatný rok.";
			}
		}
		else
		{
//			todo: zobrazuje se dvakrát při načtení stránky, kde by nemělo vůbec a i po odeslání formuláře
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

		if (!$success)
		{
			$this->pageData['errorMessage'] = error_get_last()['message'];
			$this->pageData['message'] = "Email se nepodařilo odeslat.";
		}
		else
		{
			$this->pageData['message'] = "Email byl odeslán.";

			/**
			 * potřeba přesměrovat, aby se mail neposlal dvakrát a aby se nevyplnil formulář
			 */
			$this->redirect('kontakt');
		}
	}
}