<?php

namespace Chapter07\Exercise14;

use PHPUnit\Framework\TestCase;

class Exercise14Test extends TestCase
{
    public function test_can_create_table()
    {
        $expected = 'The users table was successfully created.';
        $actual = exec("php -f app/Chapter07/Exercise14/create-table.php");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_cannot_create_table_if_it_already_exists()
    {
        $expected = "Error creating the users table: Table 'users' already exists";
        $actual = exec("php -f app/Chapter07/Exercise14/create-table.php");
        $this->assertStringContainsString($expected, $actual);
    }
}
