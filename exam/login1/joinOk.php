<?php
include 'DB.php';
include "functions.php";

$db = new DB();

/** 아이디 유효성 검사 **/
$memId = $_POST['memId'];
if ($memId == "") {
	msg("아이디를 입력해 주세요.");
} else if (preg_match("/[^a-z0-9]/i", $memId) || !preg_match("/[a-z0-9]/i", $memId) || !preg_match("/[a-z]/i", $memId)) {
	msg("아이디는 알파벳을 반드시 포함하여 알파벳+숫자로 구성해 주세요.");
} else if (strlen($memId) < 8 || strlen($memId) > 20) {
	msg("아이디는 8~20자 사이로 입력해 주세요.");
}
/** 아이디 중복 체크 **/
$sql = "SELECT COUNT(*) as count FROM member1 WHERE memId = :memId";
$stmt = $db->prepare($sql);
$stmt->bindValue(":memId", $memId);
$stmt->execute();
$cnt = $stmt->fetch(PDO::FETCH_ASSOC);
if ($cnt['count'] > 0) {
	msg("사용할 수 없는 아이디 입니다.");
}

/** 비밀번호 유효성 검사 **/
$memPw = $_POST['memPw'];
if ($memPw == "") {
	msg("비밀번호를 입력해 주세요.");
} else if (!preg_match("/[a-z]/", $memPw) || !preg_match("/[0-9]/", $memPw)|| !preg_match("/[A-Z]/", $memPw) || !preg_match("/[~!@#$%^&*()-=_+\\\{\}\[\]\;\:\"\'\,\.\/\?\|\`]/", $memPw)) {
	msg("비밀번호는 알파벳 대문자, 소문자, 숫자, 특수문자를 각각 1개이상 포함해 주세요.");
} else if (strlen($memPw) < 8 || strlen($memPw) > 20) {
	msg("비밀번호는 8~20자 사이로 입력해 주세요.");
} else if ($memPw != $_POST['memPwRe']) {
	msg("비밀번호가 일치하지 않습니다. 확인해주세요.");
}

$memPw = password_hash($_POST['memPw'], PASSWORD_DEFAULT, ["cost" => 10]);

$sql = "INSERT INTO member1 (memId, memPw, memNm, email, cellPhone) VALUES (:memId, :memPw, :memNm, :email, :cellPhone)";
$stmt = $db->prepare($sql);
$stmt->bindValue(":memId", $memId);
$stmt->bindValue(":memPw", $memPw);
$stmt->bindValue(":memNm", $_POST['memNm']);
$stmt->bindValue(":email", $_POST['email']);
$stmt->bindValue(":cellPhone", $_POST['cellPhone']);
$stmt->execute();

siteUrl("login.php");