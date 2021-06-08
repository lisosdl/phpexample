<?php

function abc($callback)
{
	$callback();
	echo "<br>";
	print_r($callback);
}

$callback = function() {
	echo "익명 함수 콜백";
};

abc($callback);