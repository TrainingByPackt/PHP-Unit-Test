<?php

namespace Chapter03\Exercise5;

use PHPUnit\Framework\TestCase;

class Exercise5Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = '1 2 3 4 5 6 7 8 9 10';
        $actual = exec("php -f app/Chapter03/Exercise5/print-numbers-while.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'a b c ';
        $actual = exec("php -f app/Chapter03/Exercise5/print-numbers-while.php");
        $this->assertNotEquals($expected, $actual);
    }
}
