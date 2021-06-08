<?php

try {
	$dsn = "mysql:host=lisosdl.cafe24.com;dbname=lisosdl";
	$db = new PDO($dsn, 'lisosdl', 'zaq7530159');
} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}

$name = '이름';
$age = 50;
$memo = '메모';
$sql = "INSERT INTO exam (name, age, memo) VALUES (:name, :age, :memo)";
$stmt = $db->prepare($sql);
$stmt->bindValue(":name", $name);
$stmt->bindValue(":age", $age);
$stmt->bindValue(":memo", $memo);
$result = $stmt->execute();

echo $db->lastInsertId();