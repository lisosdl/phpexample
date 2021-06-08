<?php
include "common.php";
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
		<!-- submit을 눌럿을경우 post 방식으로 join_ok.php로 입력받은 값을 넘김 -->
		<!-- name값으로 매칭 -->
		<form method='post' action='join_ok.php' autocomplete='off'>
			<dl>
				<dt>아이디</dt>
				<dd>
					<!-- memId -->
					<input type='text' name='memId'>
				</dd>
			</dl>
			<dl>
				<dt>비밀번호</dt>
				<dd>
					<!-- memPw -->
					<input type='password' name='memPw'>
				</dd>
			</dl>
			<dl>
				<dt>비밀번호확인</dt>
				<dd>
					<input type='password' name='memPwRe'>
				</dd>
			</dl>
			<dl>
				<dt>회원명</dt>
				<dd>
					<!-- memNm -->
					<input type='text' name='memNm'>
				</dd>
			</dl>
			<input type='submit' value='회원가입'>
		</form>
	</body>
</html>
