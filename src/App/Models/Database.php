<?php
namespace App\Models;
use PDO;

class Database extends \PDO
{
	public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
		try{			
			$conn = parent::__construct( DB_TYPE.":host=".$DB_HOST.
										 ";dbname=".$DB_NAME,
										 $DB_USER,
										 $DB_PASS
			);
			
			$this->exec("SET NAMES 'utf8';");
			
		}catch (\Exception $e){
			var_dump("Erro: Não foi possível estabelecer conexão com o banco de dados.<br />".$e->getMessage());
		}
	}
	
	/**
	 * Método usado para realizar select na base.
	 *
	 * @param string $sql SQL string
	 * @param array $array parametros para o bind
	 * @param const|int $fetchMode A PDO Fetch mode
	 * @return mixed
	 */
	public function select($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC)
	{
		$sth = $this->prepare($sql);
	
		foreach ($array as $key => $value) {
			$sth->bindValue("$key", $value);
		}
	
		$sth->execute();
		return $sth->fetchAll($fetchMode);
	}
	
	/**
	 * Método usado para realizar insert na base.
	 *
	 * @param string $table nome da tabela à ser inserido os dados
	 * @param string $data array associativo "coluna" => $valor
	 */
	public function insert($table, $data)
	{
		ksort($data);
	
		$fieldNames = implode('`, `', array_keys($data));
		$fieldValues = ':' . implode(', :', array_keys($data));
	
		$sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");
	
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}
	
		$sth->execute();
	}
	
	/**
	 * Método usado para alterar registros na tabela.
	 *
	 * @param string $table nome da tabela à ser alterado os dados
	 * @param string $data array associativo "coluna" => $valor
	 * @param string $where condição WHERE
	 */
	public function update($table, $data, $where)
	{
		ksort($data);
		$fieldDetails = NULL;
	
		foreach ($data as $key => $value) {
			$fieldDetails .= "`$key`=:$key,";
		}
	
		$fieldDetails = rtrim($fieldDetails, ',');
	
		$sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");
	
		foreach ($data as $key => $value) {
			$sth->bindValue(":$key", $value);
		}
	
		$sth->execute();
	
	}
	
	/**
	 * Método usado para excluir registros da base. 
	 *
	 * @param string $table
	 * @param string $where
	 * @param integer $limit
	 * @return integer Affected Rows
	 */
	public function delete($table, $where, $limit = 1){
		return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
	}
	
}