<?php

namespace Chapter10\Exercise4;

use PHPUnit\Framework\TestCase;

class Exercise4Test extends TestCase
{
    public function test_can_contact_spamcheck_and_get_a_response()
    {
        $expected = 'The SpamAssassin score for email test@test.com is ';
        $actual = exec("php -f app/Chapter10/Exercise4/spamcheck.php");
        $this->assertStringContainsString($expected, $actual);
    }
}
