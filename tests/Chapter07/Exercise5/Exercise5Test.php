<?php

namespace Chapter07\Exercise5;

use PHPUnit\Framework\TestCase;

class Exercise5Test extends TestCase
{
    public function test_can_read_csv_file_content()
    {
        $expectedOne = 'Line 1: Array';
        $expectedTwo = 'John';
        $expectedThree = 'Line 3:';
        $actual = $this->actual();
        $this->assertStringContainsString($expectedOne, $actual);
        $this->assertStringContainsString($expectedTwo, $actual);
        $this->assertStringContainsString($expectedThree, $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter07/Exercise5/fgetcsv.php';
        return ob_get_clean();
    }
}
