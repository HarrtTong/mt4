<?php
namespace App\Controllers;
use App\Views\View;

/**
 * Class Controller
 */
class Controller{
	/**
	 * 
	 * @param $name
	 */
	function __construct($name){
		
		$this->view = new View();

		$path = ROOT . 'src/App/Models/' . $name . '.php';

		if (file_exists($path)) {
			require $path;

			$modelName = "App\Models\\" . $name;
			$this->model = new $modelName();
		}
	}

}