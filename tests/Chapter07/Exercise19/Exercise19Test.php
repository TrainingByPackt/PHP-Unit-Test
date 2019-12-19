<?php

namespace Chapter07\Exercise19;

use PHPUnit\Framework\TestCase;

class Exercise19Test extends TestCase
{
    private const EMAIL = 'john@doe.com';

    public function test_can_delete_record_in_table()
    {
        $expectedOne = "No records matching '' were found in users table.";
        $actual = exec("php -f app/Chapter07/Exercise19/delete.php");
        $this->assertStringContainsString($expectedOne, $actual);

        $expectedTwo = "Successfully deleted 1 records matching 'john@doe.com' from users table.";
        $actual = exec("php -f app/Chapter07/Exercise19/delete.php " . self::EMAIL);
        $this->assertStringContainsString($expectedTwo, $actual);

        $expectedThree = "No records matching 'john@doe.com' were found in users table.";
        $actual = exec("php -f app/Chapter07/Exercise19/delete.php " . self::EMAIL);
        $this->assertStringContainsString($expectedThree, $actual);
    }
}
