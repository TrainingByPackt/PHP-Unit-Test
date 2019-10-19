<?php

namespace Chapter03\Activity;

use PHPUnit\Framework\TestCase;

class ActivityTest extends TestCase
{
    public function test_both_arguments_set_in_range_return_expected_values()
    {
        $expected = "> The Terminal";
        $actual = $this->actual(1, 1);
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_both_arguments_set_out_of_range_return_expected_values()
    {
        $expected = "> You Were Never Really Here";
        $actual = $this->actual(15, 10);
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_first_argument_in_range_return_expected_values()
    {
        $expected = "> Bridge of Spies";
        $actual = $this->actual(1, 10);
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_second_argument_in_range_return_expected_values()
    {
        $expected = "> Swimmer";
        $actual = $this->actual(10, 2);
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_no_arguments_return_expected_values()
    {
        $expected = "> You Were Never Really Here";
        $actual = $this->actual();
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_string_arguments_return_nothing()
    {
        $actual = exec("php -f app/Chapter03/Activity/activity-movies.php a b");
        $this->assertEmpty($actual);
    }

    private function actual(int $director = -1, int $movie = -1): string
    {
        $director = ($director < 0) ? '' : $director;
        $movie = ($movie < 0) ? '' : $movie;

        return exec("php -f app/Chapter03/Activity/activity-movies.php " . $director . ' ' . $movie);
    }
}
