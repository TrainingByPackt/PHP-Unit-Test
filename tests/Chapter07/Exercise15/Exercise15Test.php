<?php

namespace Chapter07\Exercise15;

use PHPUnit\Framework\TestCase;

class Exercise15Test extends TestCase
{
    private const EMAIL = 'john@doe.com';

    public function test_can_insert_record_with_email()
    {
        $expected = "Successfully inserted into users table the record with id 1";
        $actual = exec("php -f app/Chapter07/Exercise15/insert.php " . self::EMAIL);
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_insert_record_with_repeated_email_returns_error()
    {
        $expected = "Error inserting into the users table: Duplicate entry 'john@doe.com' for key 'email'";
        $actual = exec("php -f app/Chapter07/Exercise16/insert.php " . self::EMAIL);
        $this->assertStringContainsString($expected, $actual);
    }
}
