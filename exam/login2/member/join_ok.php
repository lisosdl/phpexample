<?php
include "../common.php";

if (isset($_SESSION['naverProfile']) && $_SESSION['naverProfile']) { // 네이버 로그인 회원가입 
	$sql = "INSERT INTO member (memId, memNm, email, snsType, snsId)
					VALUES (:memId, :memNm, :email, 'naver', :snsId)";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(":memId", $_POST['memId'], PDO::PARAM_STR);
	$stmt->bindValue(":memNm", $_POST['memNm'], PDO::PARAM_STR);
	$stmt->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
	$stmt->bindValue(":snsId", $_SESSION['naverProfile']['id']);
	$result = $stmt->execute();
	if ($result) { // 가입 완료 시 네이버 로그인 처리 
		$result = $naverLogin->login();
		if (!$result) {
			echo "<script>alert('로그인 실패');</script>";
			exit;
		}
		
		echo "<script>location.href='/';</script>";
		exit;
	} else {
		echo "<script>alert('회원 가입 실패');history.back();</script>";
		exit;
	}
	
} else { // 일반 회원 가입
	
}