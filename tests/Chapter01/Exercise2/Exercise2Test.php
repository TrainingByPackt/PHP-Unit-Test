<?php

namespace Chapter01\Exercise2;

use PHPUnit\Framework\TestCase;

class Exercise2Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = "Hello World!";
        $actual = exec("php -f app/Chapter01/Exercise2/hello.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = "Hello Earth!";
        $actual = exec("php -f app/Chapter01/Exercise2/hello.php");
        $this->assertNotEquals($expected, $actual);
    }
}
