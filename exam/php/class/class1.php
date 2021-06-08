<?php

class ClassA // 앞 글자 대문자로 표기하는게 표준
{
	// 클래스안에 정의되어 있는 변수
	public $a = 1;
	
	// 메서드 -> 클래스 안에 정의된 함수
	public function method1 ()
	{
		echo __METHOD__ . "<br>";
	}
	
	public function method2()
	{
		$this->method1();
	}
	
	// 정적인 메서드
	public static function staticMethod1()
	{
		echo __METHOD__ . "<br>";
		
		$obj = new ClassA();
		$obj->method1();
		
		// 정적인 메서드는 $this 가없다. 대신 (self::메서드;)를 사용
		self::staticMethod1();
	}
}

$obj = new ClassA(); //인스턴스 $obj -> 생성된 객체
$obj->a;
$obj->method1();

// 정적인 메서드
ClassA::staticMethod1();