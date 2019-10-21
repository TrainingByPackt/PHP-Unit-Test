<?php

namespace Chapter08\Exercise6;

use PHPUnit\Framework\TestCase;

class Exercise6Test extends TestCase
{
    public function test_no_argument_throws_exception()
    {
        $expected = 'Caught [InvalidArgumentException]: No value to check.';
        $actual = exec('php -f app/Chapter08/Exercise6/validate-email.php');
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_invalid_email_throws_validation_message()
    {
        $expected = 'Caught [InvalidEmail]: The email validation has failed.';
        $actual = exec('php -f app/Chapter08/Exercise6/validate-email.php john@');
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_valid_email_shows_valid_message()
    {
        $expected = 'The input value is valid email.';
        $actual = exec('php -f app/Chapter08/Exercise6/validate-email.php john@doe.com');
        $this->assertStringContainsString($expected, $actual);
    }
}
