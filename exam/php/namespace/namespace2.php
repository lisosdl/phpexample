<?php

namespace B;

class ClassA
{
	
}
try {
	$obj = new ClassA();

	throw new \Exception("에러 발생");
} catch (\Exception $e) {
	echo $e->getMessage();
}
