<?php

namespace Chapter08\Exercise3;

use PHPUnit\Framework\TestCase;

class Exercise3Test extends TestCase
{
    public function test_no_argument_throws_error()
    {
        $expected = 'This script requires a number as first argument.';
        $actual = exec("php -f app/Chapter08/Exercise3/sqrt.php");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_positive_integer_argument_returns_success()
    {
        $expected = 'sqrt(2) = 1.4142135623731';
        $actual = exec("php -f app/Chapter08/Exercise3/sqrt.php 2");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_not_integer_argument_throws_error_and_success()
    {
        $expected = 'sqrt(4) = 2';
        $actual = exec("php -f app/Chapter08/Exercise3/sqrt.php 4.3");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_negative_argument_throws_error()
    {
        $expected = 'sqrt(3) = 1.7320508075689';
        $actual = exec("php -f app/Chapter08/Exercise3/sqrt.php -3");
        $this->assertStringContainsString($expected, $actual);
    }
}
