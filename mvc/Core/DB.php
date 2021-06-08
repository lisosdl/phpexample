<?php

namespace Core;

class DB extends \PDO
{
	public function __construct()
	{
		try {
			$config = getConfig();
			$dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
			parent::__construct($dsn, $config['username'], $config['password']);
		} catch(\PDOException $e) {
			echo $e->getMessage();
			$GLOBALS['logger']->error($e->getMessage());
			exit;
		}
	}
}