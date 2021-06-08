<?php

try {
	$dsn = "mysql:host=lisosdl.cafe24.com;dbname=lisosdl";
	$db = new PDO($dsn, "lisosdl", "zaq7530159");
} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}
echo "<pre>";
print_r($db);