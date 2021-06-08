<?php

class DB extends PDO
{
	public function __construct()
	{
		$config = parse_ini_file("../../../config.ini");
		$dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
		parent::__construct($dsn, $config['username'], $config['password']);
	}
}