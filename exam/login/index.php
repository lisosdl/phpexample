<?php
include 'common.php';
?>

<?php if (isLogin()) : ?>
	<?=$_SESSION['member']['memNm']?>
	(<?=$_SESSION['member']['memId']?>)님 로그인... 
	<a href='logout.php'>로그아웃</a>
<?php else : ?>
	<a href='login.php'>로그인</a>
	<a href='join.php'>회원가입</a>
<?php endif; ?>