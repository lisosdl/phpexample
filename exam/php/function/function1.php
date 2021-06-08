<?php

function sum ($a = 5, $b = 10)
{
	$c = $a+$b;
	
	return $c;
}
$sum = sum();
echo "function sum() = {$sum} <br><br><br>";

$sum = sum(1,2);
echo "function sum(1, 2) = {$sum}";