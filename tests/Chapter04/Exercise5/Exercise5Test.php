<?php

namespace Chapter04\Exercise5;

use PHPUnit\Framework\TestCase;

class Exercise5Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = 'The sum of 1 and 2 is: 3';
        $actual = exec("php -f app/Chapter04/Exercise5/add.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'The sum of 1 and 2 is: 5';
        $actual = exec("php -f app/Chapter04/Exercise5/add.php");
        $this->assertNotEquals($expected, $actual);
    }
}
