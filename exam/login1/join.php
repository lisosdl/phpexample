<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
</head>
<body>
	<form method='post' action='joinOk.php' autocomplete='off'>
		<h1>회원가입</h1>
		<dl>
			<dt>아이디</dt>
			<dd>
				<input type='text' name='memId'>
			</dd>
		</dl>
		<dl>
			<dt>비밀번호</dt>
			<dd>
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
			<dt>회원이름</dt>
			<dd>
				<input type='text' name='memNm'>
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
				<input type='cellPhone' name='cellPhone'>
			</dd>
		</dl>
		<input type='submit' value='회원가입'>
	</form>
</body>
</html>