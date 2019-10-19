<?php

namespace Chapter03\Exercise7;

use PHPUnit\Framework\TestCase;

class Exercise7Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = 'Saturday Sunday Monday Tuesday Wednesday Thursday Friday';
        $actual = exec("php -f app/Chapter03/Exercise7/print-days-for.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'a b c ';
        $actual = exec("php -f app/Chapter03/Exercise7/print-days-for.php");
        $this->assertNotEquals($expected, $actual);
    }
}
