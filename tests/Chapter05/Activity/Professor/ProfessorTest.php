<?php

namespace Chapter05\Activity\Professor;

use PHPUnit\Framework\TestCase;

use App\Chapter05\Activity\Professor\Professor;
use App\Chapter05\Activity\Student\Student;

class ProfessorTest extends TestCase
{
    private const PROFESSOR_NAME = 'Charles Kingsfield';
    private const PROFESSOR_TITLE = 'Dr.';

    public function test_can_create()
    {
        $actual = $this->professor();
        $this->assertInstanceOf(Professor::class, $actual);
    }

    public function test_can_set_get_title()
    {
        $actual = $this->professor();
        $actual->setTitle(self::PROFESSOR_TITLE);
        $this->assertEquals(self::PROFESSOR_TITLE, $actual->title);
    }

    public function test_can_print_students()
    {
        $actual = $this->professor('Indiana Jones', $this->students());
        $this->assertStringContainsString(
            $actual->title . ' ' . $actual->name . "'s students (4): " . PHP_EOL .
            " 1. Elwin Ransom \n" .
            " 2. Maurice Phipps \n" .
            " 3. James Dunworthy \n" .
            " 4. Alecto Carrow \n"
        , $actual->printStudents());
    }

    private function professor(string $name = self::PROFESSOR_NAME, array $students = []): Professor
    {
        return new Professor($name, $students);
    }

    private function students(): array
    {
        return [
            new Student('Elwin Ransom'),
            new Student('Maurice Phipps'),
            new Student('James Dunworthy'),
            new Student('Alecto Carrow'),
        ];
    }
}
