<?php

class ClassA
{
	public $a =1; // 속성
	
	public function __construct()
	{
		echo __METHOD__ . "<br>";
	}
	
	// 메서드 - 클래스에 정의된 함수
	public function method1()
	{
		echo __METHOD__;
	}
}

$obj = new ClassA();

echo $obj->a . "<br>";
echo $obj->method1() . "<br>";