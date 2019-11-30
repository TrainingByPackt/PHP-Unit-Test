<?php

namespace Chapter09\Exercise8;

use PHPUnit\Framework\TestCase;

class Exercise8Test extends TestCase
{
    public function test_can_log()
    {
        $actual = exec("php -f app/Chapter09/Exercise8/index.php");
        $expectedOne = 'Something';
        $expectedTwo = 'This is an informational message';
        $expectedThree = 'This message logs an error condition';
        $expectedFour = 'This message logs unexpected exceptions';
        $this->assertStringContainsString($expectedOne, $actual);
        $f = fopen('app/Chapter09/Exercise8/logs/app.log', 'r');
        if (!feof($f)) {
            $actual = fgets($f);
            $this->assertStringContainsString($expectedTwo, $actual);

            $actual = fgets($f);
            $this->assertStringContainsString($expectedThree, $actual);

            $actual = fgets($f);
            $this->assertStringContainsString($expectedFour, $actual);
        }
        fclose($f);
    }

}
