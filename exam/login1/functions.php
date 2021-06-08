<?php

function msg($msg)
{
	echo "<script>alert('{$msg}');history.back();</script>";
	exit;
}

function siteUrl($url)
{
	echo "<script>location.href='{$url}';</script>";
	exit;
}