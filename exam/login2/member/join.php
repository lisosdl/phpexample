<?php
include "../common.php";
?>
<form method='post' action='join_ok.php'>
	<?php if ($_SESSION['naverProfile']) : ?>
	<h1>네이버 로그인 회원가입</h1>
	<?php endif; ?>
	<dl>
		<dt>아이디</dt>
		<dd><input type='text' name='memId'></dd>
	</dl>
	<dl>
		<dt>이름</dt>
		<dd>
			<input type='text' name='memNm' value='<?=$_SESSION['naverProfile']['name']?>'>
		</dd>
	</dl>
	<?php if (!isset($_SESSION['naverProfile']) && !$_SESSION['naverProfile']) : ?>
	<dl>
		<dt>비밀번호</dt>
		<dd>
			<input type='text' name='memPw'>
		</dd>
	</dl>
	<dl>
		<dt>비밀번호 확인</dt>
		<dd>
			<input type='text' name='memPwRe'>
		</dd>
	</dl>
	<?php endif; ?>
	<dl>
		<dt>이메일</dt>
		<dd>
			<input type='text' name='email' value='<?=$_SESSION['naverProfile']['email']?>'>
		</dd>
	</dl>
	<input type='submit' value='회원가입'>
</form>