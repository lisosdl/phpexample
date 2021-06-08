<?php

abstract class ClassA
{
	abstract public function method1();
	abstract public function method2();
	
	public function commonmethod()
	{
		echo __METHOD__;
	}
}

class ClassB extends ClassA
{
	public function method1()
	{
		
	}
	
	public function method2()
	{
		
	}
}