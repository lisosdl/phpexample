<?php

function sum()
{
	return function($a, $b) use ($c,$d) {
		return $a+$b+$c+$d;
	};
}

$sum1 = sum(); // 반환된 자식 함수가 유지
echo $sum1(1,2);
echo "<br>";

$sum2 = sum();
echo $sum2(2,3);