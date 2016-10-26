<?php
namespace App\Views;

class View
{
	protected $_data;
	
	public function render($name){
		require DIR_VIEWS . 'header.tpl.php';
		require DIR_VIEWS . $name . '.tpl.php';
		require DIR_VIEWS . 'footer.tpl.php';
	}
	
	public function partial($name){
		require DIR_VIEWS . $name . '.tpl.php';
	}
	
	public function setData($data){
		$this->_data = $data;
	}
	
	public function setTitle($title){
		$this->_pageInfo['title'] = $title . ' | ' . SITE_TITLE;
	}	
}