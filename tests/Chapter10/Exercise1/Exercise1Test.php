<?php

namespace Chapter10\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise1Test extends TestCase
{
    public function test_can_get_json_response()
    {
        $expected = $this->expected();
        $actual = exec("php -f app/Chapter10/Exercise1/json.php");
        $this->assertJson($actual);
        $this->assertJsonStringEqualsJsonString($expected, $actual);
    }

    private function expected(): string
    {
        return json_encode(
            [
                'email' => 'jdoe@acme.com',
                'firstName' => 'John',
                'lastName' => 'Doe',
            ]
        );
    }
}
