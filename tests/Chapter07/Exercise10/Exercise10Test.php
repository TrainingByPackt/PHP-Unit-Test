<?php

namespace Chapter07\Exercise10;

use PHPUnit\Framework\TestCase;

class Exercise10Test extends TestCase
{
    public function test_can_move_file()
    {
        $path = str_replace('tests', 'app', __DIR__);
        $expectedOne = "The target directory [$path/sample/archive/2019] does not exist. Will create... Done.";
        $expectedTwo = "The [$path/to-move.txt] file was moved in [$path/sample/archive/2019].";
        $actual = exec("php -f app/Chapter07/Exercise10/move.php");
        $this->assertStringContainsString($expectedOne, $actual);
        $this->assertStringContainsString($expectedTwo, $actual);
    }

    public function test_move_not_existing_file_shows_error_message()
    {
        $path = str_replace('tests', 'app', __DIR__);
        $expected = "The [$path/sample/to-move.txt] file does not exist.";
        $actual = exec("php -f app/Chapter07/Exercise10/move.php");
        $this->assertStringContainsString($expected, $actual);
    }
}
