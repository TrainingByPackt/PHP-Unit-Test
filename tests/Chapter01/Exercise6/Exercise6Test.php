<?php

namespace Chapter01\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise6Test extends TestCase
{
    private const COMPANY_NAME = 'Apple';

    public function test_equal_output_asserts_equal()
    {
        $expected = '<h1>Hello ' . self::COMPANY_NAME . '!</h1>';
        $actual = $this->actual();
        $this->assertStringContainsStringIgnoringCase($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = '<h2>Goodbay ' . self::COMPANY_NAME . '!</h2>';
        $actual = $this->actual();
        $this->assertStringNotContainsStringIgnoringCase($expected, $actual);
    }

    private function actual(): string
    {
        $ch = curl_init();
        $url = "http://localhost:8000/app/Chapter01/Exercise6/hello.php?companyName=" . self::COMPANY_NAME;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);

        curl_close($ch);

        return $result ?? '';
    }
}
