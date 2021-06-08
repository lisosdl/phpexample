<?php
include "common.php";
if (isLogin()) {
	msg("접근 불가 페이지!");
}
/**
	유효성 검사 - 아이디
		알파벳+ 숫자, 자리수 8~20
	
		문자열 갯수 - strlen()
*/
$memId = $_POST['memId'];
// /[~~~]/i 대소문자 구분없이, [^a-z0-9] a~z, 0~9가 아닌것
if (strlen($memId) < 8 || strlen($memId) > 20 || !preg_match("/[a-z0-9]/i", $memId)) {
	msg("아이디는 8~20자 사이의 알파벳, 숫자로 조합해주세요.");
}

// 아이디 중복 체크
$sql = "SELECT COUNT(*) as cnt FROM member3 WHERE memId = :memId";
$stmt = $db->prepare($sql);
$stmt->bindValue(":memId", $memId);
$result = $stmt->execute();
if ($result) {
	$row = $stmt->fetch(PDO::FETCH_ASSOC);
	if ($row['cnt'] > 0) { // 중복 회원 ID
		msg("이미 사용중인 아이디 입니다.");
	}
}

$memPw = $_POST['memPw'];
// 비밀번호 확인 일치 여부
if ($memPw && $memPw != $_POST['memPwRe']) {
	msg("비밀번호 확인이 일치 하지 않습니다.");
}

/**
	유효 검사 - 비밀번호
		자릿수  - 8~20
		알파벳(+1개 이상의 대문자), 1개 이상의 숫자
		+ 1개 이상의 특수문자
*/

if (strlen($memPw) < 8 || strlen($memPw) > 20 || !preg_match("/[a-z]/", $memPw) || !preg_match("/[A-Z]/", $memPw) || !preg_match("/[0-9]/", $memPw) || !preg_match("/[~!@#$%^&*]/", $memPw)) {
	msg("비밀번호는 8~20자리의 대문자 포함 알파벳과 1개 이상의 숫자, 특수문자로 입력해 주세요.");
}

// 앞에 : 가 붙으면 바인딩변수
// member3의 순서대로 memId, memPw, memNm 컬럼에 해당하는 데이터를 VALUES에 넣음
// 바인딩 처리한 :memId, :memPw, :memNm 바인딩 데이터를 VALUES에 넣음
$sql = "INSERT INTO member3 (memId, memPw, memNm) VALUES (:memId, :memPw, :memNm)";


// DB.php에 상속받은 PDO클래스의 prepare을 $stmt변수에 저장
$stmt = $db->prepare($sql); // PDOStatement 
// 비밀번호 해시 (BCRYPT - 유동해시)
$memPw = password_hash($_POST['memPw'], PASSWORD_DEFAULT, ["cost" => 10]);
// 바인딩처리
// 각각 :memId, :memNm, :memPw를 join.php에서 받아온 POST데이터를 매칭
$stmt->bindValue(":memId", $_POST['memId']);
$stmt->bindValue(":memNm", $_POST['memNm']);
$stmt->bindValue(":memPw", $memPw);
$result = $stmt->execute();

if ($result === false) {
	msg("회원 가입 실패");
}

go("login.php");