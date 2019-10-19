<?php

namespace Chapter02\Exercise5;

use PHPUnit\Framework\TestCase;

class Exercise5Test extends TestCase
{
    private const NAME = 'Jane';
    private const METERS = 1.5;
    private const CENTIMETERS = 150;

    public function test_equal_output_asserts_equal()
    {
        $expected = self::NAME . ': 2.5m';
        $actual = $this->actual();
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = self::NAME . ': 3m';
        $actual = $this->actual();
        $this->assertNotEquals($expected, $actual);
    }

    private function actual(): string
    {
        $arguments = self::NAME . ' ' . self::METERS . ' ' . self::CENTIMETERS;
        return exec("php -f app/Chapter02/Exercise5/activity-height.php " . $arguments);
    }
}
