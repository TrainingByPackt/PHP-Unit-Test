<?php

namespace Chapter04\Exercise2;

use PHPUnit\Framework\TestCase;

class Exercise2Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = print_r([
            'circle', 'rectangle', 'triangle',
        ], true);
        $actual = @$this->actual();
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = print_r([
            'banana', 'orange', 'apple',
        ], true);
        $actual = $this->actual();
        $this->assertNotEquals($expected, $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter04/Exercise2/print_r.php';
        return ob_get_clean();
    }
}
