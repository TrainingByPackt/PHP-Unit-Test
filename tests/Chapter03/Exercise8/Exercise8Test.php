<?php

namespace Chapter03\Exercise8;

use PHPUnit\Framework\TestCase;

class Exercise8Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = 'Saturday Sunday Monday Tuesday Wednesday Thursday Friday';
        $actual = exec("php -f app/Chapter03/Exercise8/print-days-foreach.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'a b c ';
        $actual = exec("php -f app/Chapter03/Exercise8/print-days-foreach.php");
        $this->assertNotEquals($expected, $actual);
    }
}
