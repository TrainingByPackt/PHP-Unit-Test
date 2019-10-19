<?php

namespace Chapter01\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise9Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $actual = $this->actual();
        $this->assertStringContainsString('$name1 : bool(true)', $actual);
        $this->assertStringContainsString('$name2: bool(false)', $actual);
        $this->assertStringContainsString('checking undeclared variable $name3: bool(false)', $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $actual = $this->actual();
        $this->assertStringNotContainsString('array', $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter01/Exercise9/isset.php';
        return ob_get_clean();
    }
}
