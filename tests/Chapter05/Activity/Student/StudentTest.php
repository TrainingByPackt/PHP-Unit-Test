<?php

namespace Chapter05\Activity\Student;

use PHPUnit\Framework\TestCase;

use App\Chapter05\Activity\Student\Student;

class StudentTest extends TestCase
{
    private const STUDENT_NAME = 'Elwin Ransom';

    public function test_can_create()
    {
        $actual = new Student(self::STUDENT_NAME);
        $this->assertInstanceOf(Student::class, $actual);
        $this->assertStringContainsString(self::STUDENT_NAME, $actual->name);
        $this->assertStringContainsString('student', $actual->title);
    }
}
