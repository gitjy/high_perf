<?php
class Person {
	public $name;
	public $gender;
	public function say() {
		echo $this->name, "is ", $this->gender;
	}
}

$student = new person();

$student->name = 'Tom';
$student->gender = 'male';

$str = serialize($student);

echo $str;

file_put_contents('store.txt', $str);

$str = file_get_contents('store.txt');
$student1 = unserialize($str);
$student1->say();

