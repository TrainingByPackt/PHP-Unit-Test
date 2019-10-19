<?php

namespace Chapter01\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise3Test extends TestCase
{
    private const ARG = 'Jane';

    public function test_equal_output_asserts_equal()
    {
        $expected = "Hello " . self::ARG;
        $actual = exec("php -f app/Chapter01/Exercise3/hello.php " . self::ARG);
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = "Hello " . self::ARG;
        $actual = exec("php -f app/Chapter01/Exercise3/hello.php Paul");
        $this->assertNotEquals($expected, $actual);
    }
}
