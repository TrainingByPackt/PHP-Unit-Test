<?php

namespace Chapter03\Exercise9;

use PHPUnit\Framework\TestCase;

class Exercise9Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $actual = $this->actual();
        $this->assertStringContainsString("The Profession is Doctor.", $actual);
        $this->assertStringContainsString("The Profession is Teacher.", $actual);
        $this->assertStringContainsString("Mathematics", $actual);
        $this->assertStringContainsString("Business English", $actual);
        $this->assertStringContainsString("Graph Theory", $actual);
        $this->assertStringContainsString("Computer Programming", $actual);
        $this->assertStringContainsString("The Profession is Programmer.", $actual);
        $this->assertStringContainsString("The Profession is Lawyer.", $actual);
        $this->assertStringContainsString("The Profession is Athlete.", $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $actual = $this->actual();
        $this->assertStringNotContainsString("The Profession is Carpenter", $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter03/Exercise9/print-professions-subjects.php';
        return ob_get_clean();
    }
}
