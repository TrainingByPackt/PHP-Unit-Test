<?php

namespace Chapter10\Exercise3;

use PHPUnit\Framework\TestCase;

class Exercise3Test extends TestCase
{
    public function test_can_contact_ipify_and_get_local_ip_as_response()
    {
        $actual = exec("php -f app/Chapter10/Exercise3/ipify.php");
        $this->assertRegExp('/^Your public facing ip address is \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/', $actual);
    }
}
