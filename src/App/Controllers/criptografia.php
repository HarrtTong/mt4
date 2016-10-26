<?php
namespace App\Controllers;
use App\Models\Seguranca;

class Criptografia extends Controller
{	
	function __construct(){
		parent::__construct('criptografia');
	}

	function index(){
		
		$data = array();
		$data["texto"]	  	= $_REQUEST["texto"] ;
		$data["chave"] 		= $_REQUEST["chave"] ;
		$data["string_ret"] = null;
		
		if(!empty($data["texto"])){
			$securityModel = new Seguranca();
			
			if($_REQUEST["tipo"] == "encrypt"){
				$data["string_ret"] = $securityModel->encrypt_string($data["texto"], $data["chave"]);
			}
			elseif($_REQUEST["tipo"] == "decrypt"){
				$data["string_ret"] = $securityModel->decrypt_string($data["texto"], $data["chave"]);
			}			
		}
						
		$this->view->setData($data);
		
		$this->view->setTitle('Criptografia e Descriptografia de Textos');
		$this->view->render('criptografia/criptografia');
	}
	

}
