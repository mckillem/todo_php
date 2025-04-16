<?php

namespace App\Pages\Controllers;

use App\Controllers\Controller;
use App\Models\Db;
use App\Pages\Models\Editor;

class EditorController extends Controller
{
	protected PageController $controller;
	public array $page = [];

	public function index(string $url = ''): void
	{
		$this->controller = new PageController();
//		$this->pageData['pages'] = $this->controller->getAllPages();
//		echo 'neco';

//		var_dump($_GET);
//		echo $_GET['id'];
//		if (isset($_GET['page_id']) && $_GET['page_id'])
		if ($url)
		{
			if (!empty($_POST) && $_POST['title'] != '' && $_POST['content'] != '' && $_POST['url'] != '' && $_POST['description'] != '' && $_POST['controller'] != '')
			{

				$this->page = Db::getPageByUrl($url);
//				$this->redirect('editor');
				$editor = new Editor();
				$editor->save($_POST, $_GET['page_id']);

				$this->redirect('administrace');
			}
		} else {
			if (!empty($_POST) && $_POST['title'] != '' && $_POST['content'] != '' && $_POST['url'] != '' && $_POST['description'] != '' && $_POST['controller'] != '')
			{
				$editor = new Editor();
				$editor->save($_POST);

				$this->redirect('administrace');
			}
		}

		$this->view = 'index';
	}
}