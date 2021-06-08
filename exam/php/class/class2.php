<?php

class ClassA
{
	public function method1()
	{
		echo __METHOD__ . "<br>";
	}
	
	protected function method2()
	{
		echo __METHOD__ . "<br>";
	}
}

class ClassB extends ClassA
{
	public function __construct()
	{
		// protected는 하위클래스 내부에서만 접근이 가능
		$this->method2(); 
	}
	
	// 상속받은 ClassA의 method1()을 재정의(메서드 오버라이딩)
	public function method1()
	{
		echo "재정의" . __METHOD__ . "<br>";
	}
}

$obj = new ClassB();
$obj->method1();
$obj->method2();