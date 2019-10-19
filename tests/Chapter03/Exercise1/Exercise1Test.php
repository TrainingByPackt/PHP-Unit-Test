<?php

namespace Chapter03\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise1Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = ("Sunday" === date('l')) ? 'Get rest' : 'Get ready and go to the office';
        $actual = exec("php -f app/Chapter03/Exercise1/test-sunday.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'Just be lazy';
        $actual = exec("php -f app/Chapter03/Exercise1/test-sunday.php");
        $this->assertNotEquals($expected, $actual);
    }
}
