<?php
namespace App\Controllers;
use App\Models\Ssh;

class Console extends Controller
{
	private $conn;
	
	function __construct(){
		parent::__construct('console');
	}

	function index(){
		
		$data = array();
		$data["host"]	  = $_REQUEST["ip"] ;
		$data["username"] = $_REQUEST["usuario"] ;
		$data["password"] = $_REQUEST["senha"] ;
		$data["port"] 	  = $_REQUEST["porta"] ;
		$data["comando"]  = $_REQUEST["cmd"] ;
		$data["erro"] 	  = null;
		$data["retorno_cmd"] = null;
		
		if(!function_exists('ssh2_connect')){
			$data["erro"] = "Existe uma pendência: <strong>libssh2</strong> não está instalada e/ou habilitada no servidor." ;
		}
		
		if(!empty($data["host"])){
			$sshModel = new Ssh();
			
			if (!($conn = $sshModel->connect($data["host"] , $data["port"]))) {
				$data["erro"] = "Não foi possível conectar no servidor SSH.";
			}
			
			if($conn){
				if (!$sshModel->auth($conn, $data["username"], $data["password"])) {
					$data["erro"] = "Não foi possível autenticar no servidor.";
				}
					
				if (!($data["retorno_cmd"] = $sshModel->execute($conn, $data["comando"]))) {
					$data["erro"] = "Não foi possível executar o comando.";
				}
			}
		}
						
		$this->view->setData($data);
		
		$this->view->setTitle('Console SSH');
		$this->view->render('console/console');
	}
	

}
