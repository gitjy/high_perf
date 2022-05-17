<?php
/**
* 类的可见性
*/
class animal
{
	protected $db ='mysql';
	const b = 1;

	public function move()
	{
		echo 'move';
	}

	protected function see()
	{
		echo 'see';
	}

	private function dna()
	{
		echo 'dna';
	}
}

class dog extends animal
{
	const b = 2;
/*	protected function move()
	{
		echo 'move';
	}*/

	protected function see()
	{
		echo 'two eyes';
	}

/*	public function dna()
	{
		echo 'dna';
	}*/
} 

$black = new dog();
echo dog::b;
echo animal::b;
$black->db;
echo 'end';