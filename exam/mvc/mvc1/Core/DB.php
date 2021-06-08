<?php

class DB extends PDO
{
	public function __construct()
	{
		try {
		$path = __DIR__ . "/../../../../../config.ini";
		$config = parse_ini_file($path);
		$dns = "mysql:host={$config['host']};dbname={$config['dbname']}";
		parent::__construct($dns, $config["username"], $config["password"]);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
}