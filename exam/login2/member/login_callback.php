<?php
include "../common.php";

$code = $_GET['code'] ?? "";
$state = $_GET['state'] ?? "";

$result = $naverLogin->checkExists($code,$state);
if ($result) { // 이미 네이버 로그인 가입 회원 -> 로그인 처리 
	$result = $naverLogin->login();
	if ($result) {
		header("Location: /");
	} else {
		echo "<script>alert('로그인실패!');location.href='/';</script>";
	}
} else { // 아직 네이버 로그인 가입 회원이 아니라면 -> 회원 가입페이지로 이동 
	header("Location: /member/join.php");
}