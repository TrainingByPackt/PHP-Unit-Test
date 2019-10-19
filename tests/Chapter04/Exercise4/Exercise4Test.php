<?php

namespace Chapter04\Exercise4;

use PHPUnit\Framework\TestCase;

class Exercise4Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = '2';
        $actual = exec("php -f app/Chapter04/Exercise4/count-me-with-GLOBALS.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = '1';
        $actual = exec("php -f app/Chapter04/Exercise4/count-me-with-GLOBALS.php");
        $this->assertNotEquals($expected, $actual);
    }
}
