<?php

namespace Chapter07\Exercise4;

use PHPUnit\Framework\TestCase;

class Exercise4Test extends TestCase
{
    public function test_can_read_file_content()
    {
        $expectedOne = 'Line 1: John,Smith,2019-03-31T10:20:30Z';
        $expectedTwo = 'Line 2: Alice,Smith,2019-02-28T12:13:14Z';
        $expectedThree = 'Line 3:';
        $actual = $this->actual();
        $this->assertStringContainsString($expectedOne, $actual);
        $this->assertStringContainsString($expectedTwo, $actual);
        $this->assertStringContainsString($expectedThree, $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter07/Exercise4/fgets.php';
        return ob_get_clean();
    }
}
