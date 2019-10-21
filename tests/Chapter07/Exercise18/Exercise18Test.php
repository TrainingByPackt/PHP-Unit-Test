<?php

namespace Chapter07\Exercise18;

use PHPUnit\Framework\TestCase;

class Exercise18Test extends TestCase
{
    private const RECORD_ID = 1;
    private const NEW_EMAIL = 'jane@doe.com';

    public function test_can_update_record_in_table()
    {
        $expectedOne = "The query ran successfully. 0 row(s) were affected.";
        $actual = exec("php -f app/Chapter07/Exercise18/update.php " . self::RECORD_ID);
        $this->assertStringContainsString($expectedOne, $actual);
        $expectedTwo = "The query ran successfully. 1 row(s) were affected.";
        $actual = exec("php -f app/Chapter07/Exercise18/update.php " . self::RECORD_ID . ' ' . self::NEW_EMAIL);
        $this->assertStringContainsString($expectedTwo, $actual);
    }
}
