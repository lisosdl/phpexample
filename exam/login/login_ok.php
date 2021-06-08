<?php
include "common.php";
if (isLogin()) {
	msg("접근 불가 페이지!");
}
/**
1. 회원데이터
2. DB의 비밀번호 해시 == 회원이 입력한 비밀번호 일치 여부 검증
3. 세션에 회원 정보를 찾을 수 있는 단서 저장 - 회원번호
*/

// 유효성 검사
if (!$_POST['memId']) {
	msg("아이디를 입력하세요.");
}

if (!$_POST['memPw']) {
	msg("비밀번호를 입력하세요.");
}

// 회원데이터 조회
$sql = "SELECT * FROM member3 WHERE memId = :memId";
$stmt = $db->prepare($sql);
$stmt->bindValue(":memId", $_POST['memId']);
$result = $stmt->execute();
if ($result === false) {
	msg("로그인 실패!");
}

/**
PDO::FETCH_ASSOC -> 연관배열 형태
PDO::FETCH_NUM -> 인덱스배열 형태
PDO::FETCH_BOTH -> 연관배열 + 인덱스배열 형태
*/
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$row) {
	msg("존재하지 않는 회원입니다.");
}

// 비밀번호 해시 일치여부 체크
// password_verify
$result = password_verify($_POST['memPw'], $row['memPw']);

if ($result === false) {
	msg("비밀번호가 일치하지 않습니다.");
}

$_SESSION['memNo'] = $row['memNo'];

go("index.php");