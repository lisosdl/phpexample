<?php

$a = 3;
$b = 4;

function abc()
{
	echo "초 전역변수 <br>";
	echo $GLOBALS['a'] . "<br>";
	echo $GLOBALS['b'] . "<br>";
	$a = 1;
	$b = 2;
}

echo "전역변수<br> {$a}<br>{$b}<br>";


abc();