<?php

class Person
{
	public function say() 
	{
		echo 'hi';
	}

	public function say($str) 	//不可以被重载
	{
		echo $str;
	}
}

$per = new Person();

$per->say('hello');