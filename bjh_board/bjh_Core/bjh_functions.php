<?php
/**
* Views 출력
* 1. header 고정출력
* 2. update, write = form, list = list
* 3. footer 고정출력
* 
*/
function views($view)
{
	include "bjh_Views/bjh_header.php";
	include "bjh_Views/bjh_{$view}.php";
	include "bjh_Views/bjh_footer.php";
}

function nextUrl($url)
{
	echo "<script>location.href='{$url}';</script>";
}