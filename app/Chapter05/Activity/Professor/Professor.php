<?php
namespace App\Chapter05\Activity\Professor;
use App\Chapter05\Activity\Student\Student;

class Professor
{
	public $name;
	public $title = 'Prof.';
	private $students = array();

	function __construct(string $name, array $students)
	{
		$this->name = $name;
		
		foreach ($students as $student) { 
			if ($student instanceof Student) {
				$this->students[] = $student;
			}
		}
	}		

	public function setTitle(string $title)
	{
		$this->title = $title;
	}

	public function printStudents()
	{
		$output = "$this->title $this->name's students (" .count($this->students). "): " . PHP_EOL;

		$serial = 1;
		foreach ($this->students as $student) {
			$output .= " $serial. $student->name " . PHP_EOL;
			$serial++;
		}

		return $output;
	}
}