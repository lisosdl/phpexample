<?php
function msg($msg)
{
	// alert으로 $msg를 출력 후 history.back()으로 되돌아감
	echo "<script>alert('{$msg}');history.back();</script>";
	exit;
}

function go($url)
{
	echo "<script>location.href='{$url}';</script>";
	exit;
}

function isLogin()
{
	if (isset($_SESSION['memNo']) && $_SESSION['memNo'])
		return true;
	return false;
}