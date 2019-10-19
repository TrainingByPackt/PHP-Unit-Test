<?php

namespace Chapter02\Activity;

use PHPUnit\Framework\TestCase;

class ActivityTest extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = "<p>Hello Joe, your BMI is 24.691358024691</p>";
        $actual = exec("php -f app/Chapter02/Activity/tracker.php");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected= "<p>Hello Jane, your BMI is 26.17</p>";
        $actual = exec("php -f app/Chapter02/Activity/tracker.php");
        $this->assertStringNotContainsString($expected, $actual);
    }
}
