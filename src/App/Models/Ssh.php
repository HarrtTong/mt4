<?php
namespace App\Models;

class Ssh
{
	/**
	 * 
	 * @param unknown $ip
	 * @param unknown $porta
	 * @return boolean|resource
	 */
	public function connect($ip, $porta){
		if ( !( $conn = ssh2_connect($ip , $porta) ) ) {
			return false;
		}
		
		return $conn;
	}
	
	/**
	 * 
	 * @param unknown $conn
	 * @param unknown $usuario
	 * @param unknown $senha
	 * @return boolean|unknown
	 */
	public function auth($conn, $usuario, $senha){
		if (!ssh2_auth_password($conn, $usuario, $senha)) {
			return false;
		}
	
		return $conn;
	}
	
	/**
	 * 
	 * @param unknown $conn
	 * @param unknown $cmd
	 * @return boolean|string
	 */
	public function execute($conn, $cmd){
		if ( !($exec = ssh2_exec($conn, $cmd)) ) {
			return false;
		
		}else{
			stream_set_blocking($exec, true);
			$retorno = '';
			
			while ($fread = fread($exec, 4096)) {
				$retorno .= $fread;
			}
			fclose($exec);
		}
		
		return $retorno;
	}
}