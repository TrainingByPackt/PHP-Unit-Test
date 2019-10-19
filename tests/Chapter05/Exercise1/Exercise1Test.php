<?php

namespace Chapter05\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise1Test extends TestCase
{
    public function test_can_create_and_get_properties()
    {
        $expectedFirst = 'Make : Honda';
        $expectedSecond = 'Model : Civic';
        $expectedThird = 'Color : Red';
        $expectedFour = 'No. of wheels : 4';
        $expectedFive = 'Engine no. : ABC123456';
        $actual = $this->actual();
        $this->assertStringContainsString($expectedFirst, $actual);
        $this->assertStringContainsString($expectedSecond, $actual);
        $this->assertStringContainsString($expectedThird, $actual);
        $this->assertStringContainsString($expectedFour, $actual);
        $this->assertStringContainsString($expectedFive, $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter05/Exercise1/Vehicle.php';
        return ob_get_clean();
    }
}
