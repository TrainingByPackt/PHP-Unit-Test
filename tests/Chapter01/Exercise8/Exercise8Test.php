<?php

namespace Chapter01\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise8Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $actual = exec("php -f app/Chapter01/Exercise8/assignment.php");
        $this->assertStringContainsString('Cat - Cat', $actual);
        $this->assertStringContainsString('Cat - Dog', $actual);
        $this->assertStringContainsString('Elephant - Elephant', $actual);
        $this->assertStringContainsString('Giraffe - Giraffe', $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $actual = exec("php -f app/Chapter01/Exercise8/assignment.php");
        $this->assertStringNotContainsString('Mouse', $actual);
        $this->assertStringNotContainsString('Mouse - Dog', $actual);
    }
}
