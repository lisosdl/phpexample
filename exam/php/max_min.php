<?php

$a = [30, 1, 20, 11, 15, 23];
$max = 0;
$min = 0;

echo "foreach<br>";
// 최댓값
foreach ($a as $v) {
	
	if ($v >= $max) {
		$max = $v;
	}
}
echo "최댓값 : " . $max . "<br>";

// 최솟값
foreach ($a as $v) {
	if ($v <= $min || $min <= 0) {
		$min = $v;
	}
}
echo "최솟값 : " . $min . "<br>";
echo "<br><br>";