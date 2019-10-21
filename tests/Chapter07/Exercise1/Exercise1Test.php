<?php

namespace Chapter07\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise1Test extends TestCase
{
    public function test_can_get_file_contents()
    {
        $expected = 'Alice,Smith,2019-02-28T12:13:14Z';
        $actual = exec("php -f app/Chapter07/Exercise1/file_get_contents.php");
        $this->assertStringStartsWith($expected, $actual);
    }
}
