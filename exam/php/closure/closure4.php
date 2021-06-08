<?php

class ClassA
{
	private $a = 1;
	
	public function method1($callback)
	{
		$callback = $callback->bindTo($this, __CLASS__);
		$callback();
	}
	
	public function method2()
	{
		echo "메서드2";
	}
}

$classA = new ClassA();
$classA->method1(function() {
	print_r($this); // $this 접근가능 bindTo -> this 바인딩
	echo $this->a;
	echo "<br>";
	$this->method2();
	//echo "인수를 함수로 호출";
});