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
	<form method='post' action='bjh_login_ok.php' autocomplete='off'>
		<h1>로그인</h1>
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
		<input type='submit' value='로그인'>
	</form>
</body>
</html>