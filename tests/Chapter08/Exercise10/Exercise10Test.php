<?php

namespace Chapter08\Exercise10;

use PHPUnit\Framework\TestCase;
use DateTime;

class Exercise10Test extends TestCase
{
    public function test_no_argument_throws_error()
    {
        $expected = '(!) A class name is required as the first argument (one of DateTime or DateTimeImmutable).';
        $actual = exec("php -f app/Chapter08/Exercise10/date.php");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_date_time_argument_returns_valid_result()
    {
        $expected = 'Result: DateTime ' . print_r(new DateTime());
        $actual = $this->actual();
        $this->assertStringContainsString($expected, $actual);
    }

    private function actual(): string
    {
        ob_start();
        exec("php -f app/Chapter08/Exercise10/date.php DateTime");
        return ob_get_clean();
    }
}
