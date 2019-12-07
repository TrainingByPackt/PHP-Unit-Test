<?php

namespace Chapter07\Exercise13;

use PHPUnit\Framework\TestCase;

class Exercise13Test extends TestCase
{
    public function test_can_connect_to_mysql_server_and_database()
    {
        $expected = 'Server version: 5.';
        $actual = exec("php -f app/Chapter07/Exercise13/connection.php");
        $this->assertInstanceOf(PDO::class, $actual);
        $this->assertStringStartsWith($expected, $actual->getAttribute(PDO::ATTR_SERVER_VERSION));
    }

    public function test_can_connect_to_mysql_server()
    {
        $expected = 'Server version: 5.';
        $actual = exec("php -f app/Chapter07/Exercise13/connection-no-db.php");
	    $this->assertInstanceOf(PDO::class, $actual);
        $this->assertStringStartsWith($expected, $actual->getAttribute(PDO::ATTR_SERVER_VERSION));
    }
}
