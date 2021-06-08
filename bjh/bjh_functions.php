<?php

function msg($msg)
{
	echo "<script>alert('{$msg}');history.back();</script>";
	exit;
}

function nextUrl($url)
{
	echo "<script>location.href='{$url}';</script>";
	exit;
}

function Login()
{
	if (isset($_SESSION['memNo']) && $_SESSION['memNo']) {
		return true;
	} else {
		return false;
	}
}