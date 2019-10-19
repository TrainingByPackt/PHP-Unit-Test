<?php

namespace Chapter04\Exercise7;

use PHPUnit\Framework\TestCase;

class Exercise7Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = 'Hello Susan';
        $actual = exec("php -f app/Chapter04/Exercise7/variable-hello.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'Hello Raoul';
        $actual = exec("php -f app/Chapter04/Exercise7/variable-hello.php");
        $this->assertNotEquals($expected, $actual);
    }
}
