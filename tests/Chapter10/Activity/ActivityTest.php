<?php

namespace Chapter10\Activity;

use PHPUnit\Framework\TestCase;

class ActivityTest extends TestCase
{
    public function test_can_contact_httpbin_and_get_response()
    {
        $expected = 'The web service responded with John Doe';
        $actual = exec("php -f app/Chapter10/Activity/httpbin.php");
        $this->assertStringContainsString($expected, $actual);
    }
}
