<?php

namespace Chapter08\Exercise5;

use PHPUnit\Framework\TestCase;

class Exercise5Test extends TestCase
{
    public function test_can_handle_exception_basic_try()
    {
        $expectedOne = 'SCRIPT START.';
        $expectedTwo = 'Run TRY block.';
        $expectedThree = 'NO ARGUMENT: Will throw exception.';
        $expectedFour = 'EXCEPTION: Argument #1 is required.';
        $expectedFive = 'FINALLY block gets executed.';
        $expectedSix = 'Outside TRY-CATCH.';
        $expectedSeven = 'SCRIPT END.';
        $actual = $this->actual_basic_try();
        $this->assertStringContainsString($expectedOne, $actual);
        $this->assertStringContainsString($expectedTwo, $actual);
        $this->assertStringContainsString($expectedThree, $actual);
        $this->assertStringContainsString($expectedFour, $actual);
        $this->assertStringContainsString($expectedFive, $actual);
        $this->assertStringContainsString($expectedSix, $actual);
        $this->assertStringContainsString($expectedSeven, $actual);
    }

    public function test_can_handle_exception_basic_all()
    {
        $expectedOne = 'SCRIPT START.';
        $expectedTwo = 'Run TRY block.';
        $expectedThree = 'NO ARGUMENT: Will throw exception.';
        $expectedFour = 'EXCEPTION: Argument #1 is required.';
        $expectedFive = 'FINALLY block gets executed.';
        $expectedSix = 'Outside TRY-CATCH.';
        $expectedSeven = 'SCRIPT END.';
        $actual = $this->actual_basic_all();
        $this->assertStringContainsString($expectedOne, $actual);
        $this->assertStringContainsString($expectedTwo, $actual);
        $this->assertStringContainsString($expectedThree, $actual);
        $this->assertStringContainsString($expectedFour, $actual);
        $this->assertStringContainsString($expectedFive, $actual);
        $this->assertStringContainsString($expectedSix, $actual);
        $this->assertStringContainsString($expectedSeven, $actual);
    }

    private function actual_basic_try(): string
    {
        ob_start();
        include_once 'app/Chapter08/Exercise5/basic-try.php';
        return ob_get_clean();
    }

    private function actual_basic_all(): string
    {
        ob_start();
        include_once 'app/Chapter08/Exercise5/basic-try-all.php';
        return ob_get_clean();
    }
}
