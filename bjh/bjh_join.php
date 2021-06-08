<?php
include "bjh_login_session.php";
if (Login()) {
	msg("접근 불가 페이지!");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<link rel='stylesheet' type='text/css' href='css/bjh_style.css'>
</head>
<body>
	<form method='post' action='bjh_join_ok.php' autocomplete='off'>
		<h1>회원가입</h1>
		<dl>
			<dt>아이디</dt>
			<dd>
				<input type='text' name='bjhId'>
			</dd>
		</dl>
		<dl>
			<dt>비밀번호</dt>
			<dd>
				<input type='password' name='bjhPw'>
			</dd>
		</dl>
		<dl>
			<dt>비밀번호 확인</dt>
			<dd>
				<input type='password' name='bjhPwRe'>
			</dd>
		</dl>
		<dl>
			<dt>이름</dt>
			<dd>
				<input type='text' name='bjhNm'>
			</dd>
		</dl>
		<dl>
			<dt>이메일</dt>
			<dd>
				<input type='email' name='email'>
			</dd>
		</dl>
		<dl>
			<dt>휴대전화번호</dt>
			<dd>
				<input type='text' name='cellPhone'>
			</dd>
		</dl>
		<input type='submit' value='회원가입'>
	</form>
</body>
</html>