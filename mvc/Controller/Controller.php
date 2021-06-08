<?php

abstract class Controller
{
	public function header()
	{
		App::render("Outline/Header/main");
	}
	
	abstract public function index();
	
	public function footer()
	{
		App::render("Outline/Footer/main");
	}
}