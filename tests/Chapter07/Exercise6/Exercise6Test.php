<?php

namespace Chapter07\Exercise6;

use PHPUnit\Framework\TestCase;

class Exercise6Test extends TestCase
{
    public function test_can_download_and_read_file()
    {
        $expectedOne = 'John,Smith,2019-03-31T10:20:30Z';
        $expectedTwo = 'Alice,Smith,2019-02-28T12:13:14Z';
        $actual = exec("php -f app/Chapter07/Exercise6/download.php");
        $this->assertStringContainsString($expectedOne, $actual);
        $this->assertStringContainsString($expectedTwo, $actual);
    }
}
