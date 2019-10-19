<?php

namespace Chapter03\Exercise2;

use PHPUnit\Framework\TestCase;

class Exercise2Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = 'The difference is 2';
        $actual = exec("php -f app/Chapter03/Exercise2/test-difference.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'The numbers are equal';
        $actual = exec("php -f app/Chapter03/Exercise2/test-difference.php");
        $this->assertNotEquals($expected, $actual);
    }
}
