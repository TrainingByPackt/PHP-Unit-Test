<?php

namespace Chapter08\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise1Test extends TestCase
{
    public function test_can_handle_error_with_custom_handler()
    {
        $expectedOne = 'Undefined variable: width';
        $expectedTwo = 'Undefined variable: height';
        $expectedThree = 'Division by zero';
        $actual = $this->actual();
        $this->assertStringContainsString($expectedOne, $actual);
        $this->assertStringContainsString($expectedTwo, $actual);
        $this->assertStringContainsString($expectedThree, $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter08/Exercise1/custom-handler.php';
        return ob_get_clean();
    }
}
