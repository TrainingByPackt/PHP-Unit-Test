<?php

namespace Chapter01\Exercise5;

use PHPUnit\Framework\TestCase;

class Exercise5Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = 'Authenticate';
        $actual = $this->actual();
        $this->assertStringContainsStringIgnoringCase($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'Horatio';
        $actual = $this->actual();
        $this->assertStringNotContainsStringIgnoringCase($expected, $actual);
    }

    private function actual(): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter01/Exercise5/login-form.html";
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }
}
