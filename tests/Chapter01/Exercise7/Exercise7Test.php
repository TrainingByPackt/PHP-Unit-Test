<?php

namespace Chapter01\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise7Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $actual = $this->actual();
        $this->assertStringContainsStringIgnoringCase('HTTP_HOST', $actual);
        $this->assertStringContainsStringIgnoringCase('GET', $actual);
        $this->assertStringContainsStringIgnoringCase('localhost', $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'google.tv';
        $actual = $this->actual();
        $this->assertStringNotContainsStringIgnoringCase($expected, $actual);
    }

    private function actual(): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter01/Exercise7/server.php";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }
}
