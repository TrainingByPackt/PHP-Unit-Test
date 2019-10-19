<?php

namespace Chapter03\Exercise4;

use PHPUnit\Framework\TestCase;

class Exercise4Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = 'The data type is Number.';
        $actual = exec("php -f app/Chapter03/Exercise4/test-datatype.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'The data type unknown.';
        $actual = exec("php -f app/Chapter03/Exercise4/test-datatype.php");
        $this->assertNotEquals($expected, $actual);
    }
}
