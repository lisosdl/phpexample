<?php
session_start();
include "bjh_functions.php";
include "bjh_DB.php";
$db = new DB();

if (Login()) {
	$sql = "SELECT * FROM bjh_member WHERE memNo = :memNo";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(":memNo", $_SESSION['memNo']);
	$stmt->execute();
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($row) {
		unset($row['memPw']);
		$_SESSION['member'] = $row;
	}
}