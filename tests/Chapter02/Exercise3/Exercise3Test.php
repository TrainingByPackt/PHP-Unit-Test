<?php

namespace Chapter02\Exercise3;

use PHPUnit\Framework\TestCase;

class Exercise3Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expectedFirstLine = "<h3>Boolean to Int</h3><h3>Before type conversion:</h3>bool(true)";
        $expectedSecondLine = '<br>bool(false)';
        $expectedThirdLine = '<h3>After type conversion:</h3>int(1)';
        $expectedFourthLine = '<br>int(0)';
        $actual = $this->actual();
        $this->assertStringContainsString($expectedFirstLine, $actual);
        $this->assertStringContainsString($expectedSecondLine, $actual);
        $this->assertStringContainsString($expectedThirdLine, $actual);
        $this->assertStringContainsString($expectedFourthLine, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = "<h3>Boolean to String</h3>";
        $actual = $this->actual();
        $this->assertStringNotContainsString($expected, $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter02/Exercise3/convertbooleanint.php';
        return ob_get_clean();
    }
}
