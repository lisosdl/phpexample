<?php
/*
$url = "http://lisosdl.cafe24.com/exam/php/curl/curl2.php?t1=1&t2=2&t3=3";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_exec($ch);
curl_close($ch);
*/

$params = [
	'r1' => 1,
	'r2' => 2,
	'r3' => 3,
];

$url = "http://lisosdl.cafe24.com/exam/php/curl/curl3.php";
$ch = curl_init();
/*
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
*/
curl_setopt_array($ch, [
	CURLOPT_URL => $url,
	CURLOPT_POST => true,
	CURLOPT_POSTFIELDS => $params,
	CURLOPT_RETURNTRANSFER, true,
]);
$data = curl_exec($ch);
curl_close($ch);

$data = json_decode($data, true);
echo "<pre>";
print_r($data);