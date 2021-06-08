<?php

class DB extends PDO
{
	public function __construct()
	{
		try {
			$dsn = "mysql:host=lisosdl.cafe24.com;dbname=lisosdl";
			parent::__construct($dsn, "lisosdl", "zaq7530159"); // 부모인 PDO클래스의 인스턴스
		} catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}
	}
}