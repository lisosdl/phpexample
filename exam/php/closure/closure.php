<?php
$a = function() {
	echo "익명함수 호출";
};

$a(); // Closure 객체의 __invoke  호출

echo "<br><pre>";
print_r($a);