<?php

namespace Chapter07\Exercise16;

use PHPUnit\Framework\TestCase;

class Exercise16Test extends TestCase
{
    private const EMAIL = 'john@doe.com';

    public function test_insert_record_without_email_returns_error()
    {
        $expected = "Error inserting into the users table: Column 'email' cannot be null";
        $actual = exec("php -f app/Chapter07/Exercise16/insert-prepared.php");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_can_insert_record_with_email()
    {
        $expected = "Successfully inserted into users table the record with id 2";
        $actual = exec("php -f app/Chapter07/Exercise16/insert-prepared.php " . self::EMAIL);
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_insert_record_with_repeated_email_returns_error()
    {
        $expected = "Error inserting into the users table: Duplicate entry 'john@doe.com' for key 'email'";
        $actual = exec("php -f app/Chapter07/Exercise16/insert-prepared.php " . self::EMAIL);
        $this->assertStringContainsString($expected, $actual);
    }
}
