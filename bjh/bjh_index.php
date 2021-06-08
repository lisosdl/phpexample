<?php 
include "bjh_login_session.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
</head>
<body>
	<?php if (Login()) : ?>
		<?=$_SESSION['member']['memNm']?>
		<?=$_SESSION['member']['memId']?>
		님
		<a href='bjh_logout.php'>로그아웃</a>
	<?php else : ?>
		<a href='bjh_login.php'>로그인</a>
		<a href='bjh_join.php'>회원가입</a>
	<?php endif; ?>
</body>
</html>