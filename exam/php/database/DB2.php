<?php

try {
	$dsn = "mysql:host=lisosdl.cafe24.com;dbname=lisosdl";
	$db = new PDO($dsn, 'lisosdl', 'zaq7530159');
} catch (PDOException $e) {
	echo $e->getMessage();
	exit;
}


$age = 30;
$sql = "SELECT * FROM exam WHERE age = :age";
$stmt = $db->prepare($sql);
$stmt->bindValue(":age", $age);
$result = $stmt->execute();
if ($result === true) {
	echo "<pre>";
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		print_r($row);
	}
}

