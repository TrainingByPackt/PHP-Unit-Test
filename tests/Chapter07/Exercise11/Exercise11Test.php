<?php

namespace Chapter07\Exercise11;

use PHPUnit\Framework\TestCase;

class Exercise11Test extends TestCase
{
    public function test_can_copy_file()
    {
        $expected = 'The [sample/to-copy.txt] file was copied to [sample/to-copy.txt.bak].';
        $actual = exec("php -f app/Chapter07/Exercise11/copy.php");
        $this->assertStringContainsString($expected, $actual);
    }
}
