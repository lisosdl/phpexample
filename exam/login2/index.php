<?php
include "common.php";
?>
<?php if ($member) : // 로그인 한 경우 ?>
<?=$member['memNm']?>(<?=$member['memId']?>)님 로그인...
<a href='member/logout.php'>로그아웃</a>
<?php else : // 로그인 하지 않은 경우 ?>
<a href='member/login.php'>로그인</a>
<a href='member/join.php'>회원가입</a>
<?php endif; ?>
