<?php

try {
	$dsn = "mysql:host=lisosdl.cafe24.com;dbname=lisosdl";
	$db = new PDO($dsn, "lisosdl", "zaq7530159");
} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}

$stmt = $db->query("SELECT * FROM exam");

/*
PDO::FETCH_ASSOC - 연관배열 (키=>값)
PDO::FETCH_NUM - 인덱스배열
PDO::FETCH_BOTH - 연관배열 + 인덱스배열
*/

echo "<pre>";
while ($row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
	print_r($row);
}