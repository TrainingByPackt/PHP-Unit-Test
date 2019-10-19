<?php

namespace Chapter04\Exercise3;

use PHPUnit\Framework\TestCase;

class Exercise3Test extends TestCase
{
    private const SIGNALS = ['red', 'amber', 'green',];
    private const FIRST_SORT_STREETS = ['crosswall', 'lothbury', 'Moorgate', 'walbrook',];
    private const SECOND_SORT_STREETS = ['Moorgate', 'crosswall', 'lothbury',  'walbrook',];

    public function test_equal_output_asserts_equal()
    {
        $expected = print_r(self::SIGNALS, true);
        $expected .= print_r(array_reverse(self::SIGNALS), true);
        $expected .= print_r(self::SIGNALS, true);
        $expected .= print_r(self::FIRST_SORT_STREETS, true);
        $expected .= print_r(self::SECOND_SORT_STREETS, true);

        $actual = $this->actual();
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = print_r([
            'red', 'crosswall', 'walbrook',
        ], true);
        $actual = $this->actual();
        $this->assertStringNotContainsString($expected, $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter04/Exercise3/array-functions.php';
        return ob_get_clean();
    }
}
