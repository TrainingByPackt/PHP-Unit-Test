<?php

namespace Chapter07\Exercise10;

use PHPUnit\Framework\TestCase;

class Exercise10Test extends TestCase
{
    public function test_can_move_file()
    {
        $expectedOne = 'The target directory [sample/archive/2019] does not exist. Will create... Done.';
        $expectedTwo = 'The [to-move.txt] file was moved in [sample/archive/2019].';
        $actual = exec("php -f app/Chapter07/Exercise10/move.php");
        $this->assertStringContainsString($expectedOne, $actual);
        $this->assertStringContainsString($expectedTwo, $actual);
    }

    public function test_move_not_existing_file_shows_error_message()
    {
        $expected = 'The [sample/to-move.txt] file does not exist.';
        $actual = exec("php -f app/Chapter07/Exercise10/move.php");
        $this->assertStringContainsString($expected, $actual);
    }
}
