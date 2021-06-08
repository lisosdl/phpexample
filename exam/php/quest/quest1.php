<?php

$a = [0,1,2,3,4,5,6,7,8,9];
$b = [];

for ($i = 0; $i < count($a); $i++) {
	$b[$i] = $a[rand(0, count($a)-1)]
}

echo "<pre>";
print_r($b);