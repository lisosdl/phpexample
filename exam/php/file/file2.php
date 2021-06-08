<?php

/** **/
/*
$url = "http://lisosdl.cafe24.com/exam/php/file/file3.php/";

$params = ['t1' => 1, 't2' => 2, 't3' => 3];
$option = [
	'http' => [
		'method' => 'POST',
		'header' => 'Content-Type : application/x-www-form-urlencoded;charset=utf-8',
		'content' => http_build_query($params),
	],
];

$context = stream_context_create($option);
 $file = file_get_contents($url, false, $context);
echo $file;
*/
/** **/
file_put_contents("data.txt", "파일 쓰기");