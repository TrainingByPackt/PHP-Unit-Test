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
        $actual = $this->actual();
        $expected = "Result: " . print_r(new DateTime(), true);
        $this->assertStringContainsString($actual, $expected);
    }

    private function actual() {
        ob_start();
        exec("php -f app/Chapter08/Exercise10/date.php DateTime");
        return ob_get_clean();
    }
}
