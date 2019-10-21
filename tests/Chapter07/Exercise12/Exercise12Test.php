<?php

namespace Chapter07\Exercise12;

use PHPUnit\Framework\TestCase;

class Exercise12Test extends TestCase
{
    public function test_can_connect_to_database_server()
    {
        $expected = 'Connected to MySQL server v5.';
        $actual = exec("php -f app/Chapter07/Exercise12/connect.php");
        $this->assertStringStartsWith($expected, $actual);
    }
}
