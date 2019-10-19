<?php
namespace App\Chapter05\Activity\Student;

class Student
{
	public $name;
	public $title = 'student';

	function __construct(string $name)
	{
		$this->name = $name;
	}
}