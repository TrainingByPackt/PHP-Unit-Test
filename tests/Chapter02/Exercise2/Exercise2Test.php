<?php

namespace Chapter02\Exercise2;

use PHPUnit\Framework\TestCase;

class Exercise2Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = "<pre>The weapon of choice for Captain America is Shield<br>Thor wields Mjolnir";
        $actual = exec("php -f app/Chapter02/Exercise2/array.php");
        $this->assertStringContainsString($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = "<pre>The weapon of choice for Captain America is Mjolnir<br>Thor wields Shield";
        $actual = exec("php -f app/Chapter02/Exercise2/array.php");
        $this->assertStringNotContainsString($expected, $actual);
    }
}
