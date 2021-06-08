<?php
session_start();

if (isLogin()) {
	$sql = "SELECT * FROM member3 WHERE memNo = :memNo";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(":memNo", $_SESSION['memNo']);
	$result = $stmt->execute();
	if ($result) {
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($row) {
			unset($row['memPw']);
			$_SESSION['member'] = $row;
		}
	}
}