<?php
/** DB **/
include "bjh_login_session.php";

if (Login()) {
	msg("접근 불가 페이지!");
}

/** 아이디 유효성 검사 **/
$memId = $_POST['bjhId'];
if ($memId == "") { // 아이디를 입력하지 않을경우
	msg("아이디를 입력해 주세요.");
} else if (!preg_match("/[a-z0-9]/i", $memId)) { // 아이디 패턴
	msg("아이디는 영어와 숫자만 입력 가능합니다. 다시 입력해주세요.");
} else if (strlen($memId) < 8 || strlen($memId) > 20) { // 아이디 길이조정
	msg("아이디를 8~20자 사이로 입력해주세요.");
}

/** 아이디 중복 체크 **/
$sql = "SELECT COUNT(*) as count FROM bjh_member WHERE memId = :memId";
$stmt = $db->prepare($sql);
$stmt->bindValue(":memId", $memId);
$stmt->execute();
$cnt = $stmt->fetch(PDO::FETCH_ASSOC);
if ($cnt['count']) {
	msg("사용할 수 없는 아이디 입니다.");
}

/** 비밀번호 유효성 검사 **/
$memPw = $_POST['bjhPw'];
if ($memPw == "") {
	msg("비밀번호를 입력해 주세요.");
} else if (!preg_match("/[a-z]/", $memPw) || !preg_match("/[0-9]/", $memPw) || !preg_match("/[A-Z]/", $memPw) || !preg_match("/[~!@#$%^&*\\\(\)\{\}\[\];\'\"<>\/.]/", $memPw)) {
	msg("비밀번호는 영어 대문자, 소문자, 숫자, 특수문자를 각각 최소 1개이상 조합해 주세요.");
} else if (strlen($memPw) < 8 || strlen($memPw) >20) {
	msg("비밀번호를 8~20자 사이로 입력해주세요.");
} else if ($memPw != $_POST['bjhPwRe']) {
	msg("비밀번호가 일치하지 않습니다. 확인해주세요.");
}

/** 비밀번호 hash-bcript **/
$memPw = password_hash($_POST['bjhPw'], PASSWORD_DEFAULT, ["cost" => 10]);

/** insert 구문 **/
$sql = "INSERT INTO bjh_member (memId, memPw, memNm, email, cellPhone) VALUES (:memId, :memPw, :memNm, :email, :cellPhone)";

/** 바인딩 **/
$stmt = $db->prepare($sql);
$stmt->bindValue(":memId", $_POST['bjhId']);
$stmt->bindValue(":memPw", $memPw);
$stmt->bindValue(":memNm", $_POST['bjhNm']);
$stmt->bindValue(":email", $_POST['email']);
$stmt->bindValue(":cellPhone", $_POST['cellPhone']);
$stmt->execute();

nextUrl("bjh_login.php");