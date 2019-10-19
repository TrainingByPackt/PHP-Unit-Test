<?php

namespace Chapter04\Exercise6;

use PHPUnit\Framework\TestCase;

class Exercise6Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = '15';
        $actual = exec("php -f app/Chapter04/Exercise6/callable.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = '12';
        $actual = exec("php -f app/Chapter04/Exercise6/callable.php");
        $this->assertNotEquals($expected, $actual);
    }
}
