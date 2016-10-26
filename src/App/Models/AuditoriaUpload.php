<?php
namespace App\Models;

class AuditoriaUpload extends Model
{
	private $path_upload;
	private $path_relative_upload;
	
	function __construct(){
		parent::__construct();
		
		$this->path_upload = ROOT . "assets/uploads/";
		$this->path_relative_upload = "assets/uploads/";
	}
	
	/**
	 * 
	 * @param file $arquivo
	 * @return boolean
	 */
	public function enviarArquivo( $arquivo ){
		if(!$arquivo){
			return false;
		}
		
		date_default_timezone_set("Brazil/East"); //Definindo timezone padrão
		
		$ext = strtolower(substr($arquivo['name'],-4)); //Pegando extensão do arquivo
		
		$enviar = move_uploaded_file($arquivo['tmp_name'], $this->path_upload . $arquivo['name']); //Fazer upload do arquivo
	
		if($enviar){
			$this->salvarArquivo($arquivo, $this->path_upload, $ext);
		}
			
		return $enviar;
	}
	
	/**
	 * 
	 * @return mixed
	 */
	public function getListArquivos(){
		$sql = "SELECT * FROM auditoria ORDER BY data DESC" ; 
		
		$rs = $this->db->select($sql);
		
		return $rs;
	}
	
	/**
	 * 
	 * @param integer $id
	 * @return mixed
	 */
	public function getArquivoById( $id ){
		$sql = sprintf("SELECT * FROM auditoria WHERE id=%d;", $id) ;
		$rs = $this->db->select($sql);
	
		return $rs[0];
	}
	
	/**
	 *
	 * @param integer $id
	 * @return boolean|mixed
	 */
	public function excluirArquivoById( $id ){
		if(empty($id)){
			return false;
		}
		
		$arquivo = $this->getArquivoById($id) ;
		$path = $arquivo["path"] ;
				
		$where = sprintf("id=%d;", $id) ;
		$rs = $this->db->delete("auditoria", $where, 1);
	
		//Exclui o arquivo do servidor		
		$this->excluirArquivoFisicoByPath($path) ;
		
		return $rs;
	}
	
	/**
	 *
	 * @param string $path
	 * @return mixed
	 */
	private function excluirArquivoFisicoByPath( $path ){
		if(empty($path)){
			return false;
		}
	
		@unlink($path) ;
	
		return true;
	}
	
	/**
	 * 
	 * @param unknown $arquivo
	 * @param unknown $id_arq_validar
	 * @return boolean
	 */
	public function validarArquivo( $arquivo, $id_arq_validar ){
		if(!$arquivo || !$id_arq_validar){
			return false;
		}
		
		$nome_arq 	 = $arquivo['name'] ;
		$extensao	 = substr($arquivo['name'], -4) ;
		$tipo_arq 	 = $arquivo['type'] ;
		$tamanho_arq = $arquivo['size'] ;
		
		$dados_arquivo_servidor = $this->getArquivoById($id_arq_validar);

		if( ($nome_arq != $dados_arquivo_servidor["nome_arquivo"]) ||
			($extensao != $dados_arquivo_servidor["extensao"]) ||
			($tipo_arq != $dados_arquivo_servidor["tipo"]) ||
			($tamanho_arq != $dados_arquivo_servidor["tamanho"]) ){

			return false;
		}
		
		return true ;		
	}
	
	/**
	 * 
	 * @param file $arquivo
	 * @param string $path
	 * @param string $ext
	 * @return void|boolean
	 */
	private function salvarArquivo( $arquivo, $path, $ext){
		if(!$arquivo){
			return false;
		}
		
		$nome_arq 	 = $arquivo['name'] ;
		$extensao	 = $ext ;
		$tipo_arq 	 = $arquivo['type'] ;
		$tamanho_arq = $arquivo['size'] ;
		$path 		 = $path . $nome_arq;
		$url 		 = URL . $this->path_relative_upload. $nome_arq;
				
		$data = array(
						"path" 			=> $path,
						"url" 			=> $url,
						"nome_arquivo"	=> $nome_arq,
						"extensao"		=> $extensao,
						"tamanho"		=> $tamanho_arq,
						"tipo"			=> $tipo_arq,
						"data"			=> date("Y-m-d H:i:s")
		);
		
		$this->db->insert( "auditoria", $data );
		
		return;
	}
}