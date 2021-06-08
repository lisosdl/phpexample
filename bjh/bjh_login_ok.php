<?php
include "bjh_login_session.php";
if (Login()) {
	msg("접근 불가 페이지!");
}
/** 아이디 유효성 검사 **/
$memId = $_POST['bjhId'];
if ($memId == "") {
	msg("아이디를 입력해 주세요.");
}

/** 비밀번호 유효성 검사 **/
$memPw = $_POST['bjhPw'];
if ($memPw == "") {
	msg("비밀번호를 입력해 주세요.");
}

/** 회원데이터 체크 **/
$sql = "SELECT COUNT(*) as count FROM bjh_member WHERE memId = :memId";
$stmt = $db->prepare($sql);
$stmt->bindValue(":memId", $memId);
$stmt->execute();
$cnt = $stmt->fetch(PDO::FETCH_ASSOC);
if ($cnt['count'] == 0) {
	msg("존재하지 않는 회원입니다.");
}

/** 회원데이터 조회 **/
$sql = "SELECT * FROM bjh_member WHERE memId = :memId";
$stmt = $db->prepare($sql);
$stmt->bindValue(":memId", $memId);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$pwcheck = password_verify($_POST['bjhPw'], $row['memPw']);
if ($pwcheck === false) {
	msg("비밀번호가 일치하지 않습니다.");
}

$_SESSION['memNo'] = $row['memNo'];

nextUrl("bjh_index.php");