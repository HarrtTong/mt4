<?php
namespace App\Controllers;
use App\Models\AuditoriaUpload;

class Auditoria extends Controller
{	
	function __construct(){
		parent::__construct('auditoria');
	}

	function index(){
		
		$data = array();
		$data["arquivo"]  = $_FILES['arquivo'] ;
		$id_arquivo_validar = $_REQUEST["validar"] ;
		$excluir = $_REQUEST["excluir"] ;
		
		$auditoriaModel = new AuditoriaUpload();

		if(!empty($excluir)){
			$delete = $auditoriaModel->excluirArquivoById( $excluir ) ;
			
			if($delete){
				$data["mensagem"] = "Arquivo <strong>ID $excluir excluído</strong> com sucesso.";
				$data["tpmensagem"] = 'warning';
			}else{
				$data["mensagem"] = "<strong>Não foi possível excluir o arquivo ID $excluir.</strong>";
				$data["tpmensagem"] = 'error';
			}
			
		}elseif(!empty($data["arquivo"])){
			
			if(!empty($id_arquivo_validar)){
				$validar = $auditoriaModel->validarArquivo( $data["arquivo"], $id_arquivo_validar ) ;
					
				if($validar){
					$data["mensagem"] = 'Arquivo <strong>validado</strong> com sucesso.';
					$data["tpmensagem"] = 'info';
				}else{
					$data["mensagem"] = '<strong>ATENÇÃO:</strong> Verifique se o arquivo foi violado. Arquivo enviado não corresponde ao arquivo no servidor.';
					$data["tpmensagem"] = 'warning';
				}
			}else{
				$envio = $auditoriaModel->enviarArquivo( $data["arquivo"] ) ;
					
				if($envio){
					$data["mensagem"] = 'Arquivo adicionado com sucesso.';
					$data["tpmensagem"] = 'success';
				}else{
					$data["mensagem"] = 'Erro ao adicionar arquivo.';
					$data["tpmensagem"] = 'error';
				}
			}			
		
		}
		
		$data["dados"] = $auditoriaModel->getListArquivos();

		$data["view"] = $this->view;
		$this->view->setData($data);
		
		$this->view->setTitle('Auditoria de Arquivos');
		$this->view->render('auditoria/auditoria');
	}
	

}
