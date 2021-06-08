<?php
include 'common.php';
if (isLogin()) {
	msg("접근 불가 페이지!");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
</head>
<body>
	<form method='post' action='login_ok.php' autocomplete='off'>
		<input type='text' name='memId' placeholder='아이디'>
		<input type='password' name='memPw' placeholder='비밀번호'>
		<input type='submit' value='로그인'>
	</form>
</body>
</html>