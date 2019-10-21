<?php

namespace Chapter07\Exercise9;

use PHPUnit\Framework\TestCase;

class Exercise9Test extends TestCase
{
    public function test_can_delete_file()
    {
        $expected = 'The [sample/to-delete.txt] file was deleted.';
        $actual = exec("php -f app/Chapter07/Exercise9/delete.php");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_delete_not_existing_file_shows_error_message()
    {
        $expected = 'The [sample/to-delete.txt] file does not exist.';
        $actual = exec("php -f app/Chapter07/Exercise9/delete.php");
        $this->assertStringContainsString($expected, $actual);
    }
}
