<?php

namespace Chapter03\Exercise11;

use PHPUnit\Framework\TestCase;

class Exercise11Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = '1 2 3 4 5 6 7 9 10';
        $actual = exec("php -f app/Chapter03/Exercise11/print-numbers-continue.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = '1 2 3 4 5 6 7 8 9 10';
        $actual = exec("php -f app/Chapter03/Exercise11/print-numbers-continue.php");
        $this->assertNotEquals($expected, $actual);
    }
}
