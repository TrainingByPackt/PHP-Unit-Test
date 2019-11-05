<?php

namespace Chapter07\Exercise7;

use PHPUnit\Framework\TestCase;

class Exercise7Test extends TestCase
{
    public function test_can_write_to_file()
    {
        $path = str_replace('tests', 'app', __DIR__);
        $expectedOne = "> Successfully written 28 bytes to [$path/sample/write-with-fwrite.txt]";
        $expectedTwo = 'File written with fwrite().';
        $expectedThree = "> Successfully written 39 bytes to [$path/sample/write-with-fpc.txt]";
        $expectedFour = 'File written with file_put_contents().';
        $actual = $this->actual();
        $this->assertStringContainsString($expectedOne, $actual);
        $this->assertStringContainsString($expectedTwo, $actual);
        $this->assertStringContainsString($expectedThree, $actual);
        $this->assertStringContainsString($expectedFour, $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter07/Exercise7/write.php';
        return ob_get_clean();
    }
}
