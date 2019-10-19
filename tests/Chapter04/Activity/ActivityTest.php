<?php

namespace Chapter04\Activity;

use PHPUnit\Framework\TestCase;

class ActivityTest extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expectedFirst = '6';
        $expectedSecond = '6';
        $expectedThird = 'The number you entered was prime.';
        $actual = $this->actual();
        $this->assertStringContainsString($expectedFirst, $actual);
        $this->assertStringContainsString($expectedSecond, $actual);
        $this->assertStringContainsString($expectedThird, $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter04/Activity/activity.php';
        return ob_get_clean();
    }
}
