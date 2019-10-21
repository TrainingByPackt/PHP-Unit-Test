<?php

namespace Chapter08\Exercise9;

use PHPUnit\Framework\TestCase;

class Exercise9Test extends TestCase
{
    public function test_no_argument_throws_error()
    {
        $expected = '(!) A function/class name is required as the first argument.';
        $actual = exec("php -f app/Chapter08/Exercise9/run.php");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_no_existing_function_throws_error()
    {
        $expected = '(!) The [multi] function or class does not exist.';
        $actual = exec("php -f app/Chapter08/Exercise9/run.php multi");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_existing_function_with_no_argument_throws_error()
    {
        $expected = 'Result: NULL';
        $actual = exec("php -f app/Chapter08/Exercise9/run.php sqrt");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_valid_arguments_return_valid_result()
    {
        $expected = 'Result: 1.4142135623731';
        $actual = exec("php -f app/Chapter08/Exercise9/run.php sqrt 2");
        $this->assertStringContainsString($expected, $actual);
    }
}
