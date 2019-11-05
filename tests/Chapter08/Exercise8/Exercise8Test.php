<?php

namespace Chapter08\Exercise8;

use PHPUnit\Framework\TestCase;

class Exercise8Test extends TestCase
{
    public function test_no_argument_throws_error()
    {
        $expected = '----------------------------------------------------------------------';
        $actual = exec("php -f app/Chapter08/Exercise8/sqrt-all.php");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_positive_integer_argument_returns_success()
    {
        $expected = 'sqrt(5) = 2.2360679774998';
        $actual = exec("php -f app/Chapter08/Exercise8/sqrt-all.php 5");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_not_integer_argument_throws_error_and_success()
    {
        $expected = 'sqrt(4) = 2';
        $actual = exec("php -f app/Chapter08/Exercise8/sqrt-all.php 4.3");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_negative_argument_throws_error()
    {
        $expected = '';
        $actual = exec("php -f app/Chapter08/Exercise8/sqrt-all.php -3");
        $this->assertStringContainsString($expected, $actual);
    }
}
