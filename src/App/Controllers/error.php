<?php
namespace App\Controllers;

class Error extends Controller
{
	function __construct(){
		parent::__construct('error');
	}

	function index($error = '404'){
		$data = array();

		switch ($error) {
			case '404':
				$data['title'] = 'Erro 404';
				$data['msg'] = "P�gina n�o encontrada.";
				break;
			case '500':
			default:
				$data['title'] = 'Erro 500';
				$data['msg'] = "Internal Server Error";
				break;
		}

		$this->view->setTitle($data['title']);
		$this->view->setData($data);
		$this->view->render('error/index');
	}

}
