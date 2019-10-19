<?php

namespace Chapter04\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise1Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expectedStart = 'Hello';
        $expectedEnd = mb_convert_encoding('ën', 'ISO-8859-1');
        $actual = $this->actual();
        $this->assertStringStartsWith($expectedStart, $actual);
        $this->assertStringEndsWith($expectedEnd, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'Bye bye';
        $actual = $this->actual();
        $this->assertStringNotContainsString($expected, $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter04/Exercise1/hello.php';
        return ob_get_clean();
    }
}
