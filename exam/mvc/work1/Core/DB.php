<?php
/**
DB 연결 클래스
*/
class DB extends PDO {
	public function __construct()
	{
		try {
			$config = parse_ini_file(__DIR__ . "/../../../../../config.ini");
			$dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
			parent::__construct($dsn, $config["username"], $config["password"]);
		} catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
}