<?php

namespace Chapter01\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise1Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = "Hello World!";
        $actual = exec("php -r \"echo 'Hello World!';\"");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = "Hello Earth!";
        $actual = exec("php -r \"echo 'Hello World!';\"");
        $this->assertNotEquals($expected, $actual);
    }
}
