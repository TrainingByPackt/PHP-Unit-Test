<?php

namespace Chapter03\Exercise3;

use PHPUnit\Framework\TestCase;

class Exercise3Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = 'Teenager';
        $actual = exec("php -f app/Chapter03/Exercise3/test-age.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'Child';
        $actual = exec("php -f app/Chapter03/Exercise3/test-age.php");
        $this->assertNotEquals($expected, $actual);
    }
}
