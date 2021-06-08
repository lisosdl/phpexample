<?php

function abc($callback)
{
	$param = "abc에서 전달된 인자";
	$callback($param);
}

abc(function($param) {
	echo $param;
});