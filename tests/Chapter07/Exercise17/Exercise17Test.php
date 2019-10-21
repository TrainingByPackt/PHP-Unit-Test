<?php

namespace Chapter07\Exercise17;

use PHPUnit\Framework\TestCase;

class Exercise17Test extends TestCase
{
    public function test_can_read_table()
    {
        $expectedOne = "All records";
        $expectedTwo = "1	john@doe.com";
        $expectedThree= "Use LIMIT 2";
        $expectedFour = "Use WHERE id > 3";
        $expectedFive = "Use ORDER BY id DESC";
        $actual = exec("php -f app/Chapter07/Exercise17/select-all.php");
        $this->assertStringContainsString($expectedOne, $actual);
        $this->assertStringStartsWith($expectedTwo, $actual);
        $this->assertStringContainsString($expectedThree, $actual);
        $this->assertStringContainsString($expectedFour, $actual);
        $this->assertStringContainsString($expectedFive, $actual);
    }
}
