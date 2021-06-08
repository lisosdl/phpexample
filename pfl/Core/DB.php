<?php
/**
* INSERT, UPDATE, DELECT, SELECT, WHERE
* INSERT INTO 테이블명 (컬럼, ...) VALUES (값, ..)
* UPDATE 테이블명 SET 컬럼 = 값, ... WHERE 조건
* DELETE FROM 테이블명 WHERE 조건
* SELECT 컬럼, ... FROM 테이블명 WHERE 조건
*/
class DB extends PDO
{
	public function __construct()
	{
		try {
			$path = __DIR__ . "/../../../config.ini";
			$config = parse_ini_file($path);
			$dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
			parent::__construct($dsn, $config["username"], $config["password"]);
		} catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
	
	/**
	* insert 함수
	* INSERT INTO 테이블명 (컬럼, ...) VALUES (값, ..)
	*/
	public function insert($table, $columns = [], $params = [])
	{
		$i = 0;
		$data = array_flip(array_values($columns));
		foreach ($data as $k => $v) {
			$data[$k] = $params[$i];
			$i++;
		}
		// insert구문 
		$sql = "INSERT INTO {$table} (" . implode(",", $columns) . ") VALUES (" . implode(",:", $columns) . ")";
		$stmt = $this->prepare($sql);
		foreach($data as $k => $v) {
			$stmt->bindValues(":".$k, $v);
		}
		$result = $stmt->execute();
		return $result;
	}
	
	/**
	* UPDATE함수
	* UPDATE 테이블명 SET 컬럼 = 값, ... WHERE 조건
	*/
	public function update($table, $columns = [], $params = [], $where)
	{
		
	}
	
	/**
	*
	* DELETE FROM 테이블명 WHERE 조건
	*/
}