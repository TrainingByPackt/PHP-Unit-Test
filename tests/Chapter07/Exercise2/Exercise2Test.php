<?php

namespace Chapter07\Exercise2;

use PHPUnit\Framework\TestCase;

class Exercise2Test extends TestCase
{
    public function test_can_get_file_contents()
    {
        $expected = '2 iteration(s)';
        $actual = exec("php -f app/Chapter07/Exercise2/fread.php");
        $this->assertStringStartsWith($expected, $actual);
    }
}
