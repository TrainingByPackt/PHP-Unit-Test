<?php

namespace Chapter02\Exercise4;

use PHPUnit\Framework\TestCase;

class Exercise4Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expectedFirstLine = "<h3>int to string:</h3><h3>Before type conversion:</h3>int(1234)";
        $expectedSecondLine = '<h3>After type conversion:</h3>string(4) "1234"';
        $actual = $this->actual();
        $this->assertStringContainsString($expectedFirstLine, $actual);
        $this->assertStringContainsString($expectedSecondLine, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = "<h3>String to Array</h3>";
        $actual = $this->actual();
        $this->assertStringNotContainsString($expected, $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter02/Exercise4/convertintstring.php';
        return ob_get_clean();
    }
}
