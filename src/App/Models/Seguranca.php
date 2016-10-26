<?php
namespace App\Models;

class Seguranca
{
	/**
	 * 
	 * @param string $string
	 * @param string $keyText
	 * @param string $salt
	 * @return string
	 */
	public function encrypt_string($string = '', $keyText='90', $salt = 'A270ECDE1B3B938B590E547138BB7F120EA') {
		$key = pack('H*',  $this->strToHex($keyText).$salt);
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $string, MCRYPT_MODE_CBC, $iv);
		
		return base64_encode($iv . $ciphertext);
	}
	
	/**
	 * 
	 * @param string $encodedText
	 * @param string $keyText
	 * @param string $salt
	 * @return string
	 */
	public function decrypt_string($encodedText = '', $keyText='90', $salt = 'A270ECDE1B3B938B590E547138BB7F120EA') {
		$key = pack('H*', $this->strToHex($keyText).$salt);
		$ciphertext_dec = base64_decode($encodedText);
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
		$iv_dec = substr($ciphertext_dec, 0, $iv_size);
		$ciphertext_dec = substr($ciphertext_dec, $iv_size);
		
		return mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
	}
	
	/**
	 * 
	 * @param unknown $string
	 * @return string hexadecimal
	 */
	private function strToHex( $string ){
		$hex='';
		for ($i=0; $i < strlen($string); $i++){
			$hex .= dechex(ord($string[$i]));
		}
		
		return $hex;
	}
}