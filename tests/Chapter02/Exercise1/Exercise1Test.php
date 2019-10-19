<?php

namespace Chapter02\Exercise1;

use PHPUnit\Framework\TestCase;

class Exercise1Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expected = "Your order total is: 25";
        $actual = exec("php -f app/Chapter02/Exercise1/order.php");
        $this->assertEquals($expected, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = "Your order total is: 30";
        $actual = exec("php -f app/Chapter02/Exercise1/order.php");
        $this->assertNotEquals($expected, $actual);
    }
}
