<?php

namespace Chapter03\Exercise10;

use PHPUnit\Framework\TestCase;

class Exercise10Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = '1 2 3 4 5 6 7 8 ends the execution of loop.';
        $actual = exec("php -f app/Chapter03/Exercise10/print-numbers-break.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'a b c ';
        $actual = exec("php -f app/Chapter03/Exercise10/print-numbers-break.php");
        $this->assertNotEquals($expected, $actual);
    }
}
