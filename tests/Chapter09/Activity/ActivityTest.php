<?php

namespace Chapter09\Activity;

use PHPUnit\Framework\TestCase;

class ActivityTest extends TestCase
{
    public function test_can_log()
    {
        exec("php -f app/Chapter09/Activity/index.php");
        $expectedOne = 'Something';
        $expectedTwo = 'This is an informational message';
        $expectedThree = 'This message logs an error condition';
        $expectedFour = 'This message logs unexpected exceptions';
        $f = fopen('app/Chapter09/Activity/application_log', 'r');
        if (!feof($f)) {
            $actual = fgets($f);
            $expected = 'Undefined variable: width';
            $this->assertStringContainsString($expectedOne, $actual);

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
