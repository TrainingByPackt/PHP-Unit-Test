<?php

namespace Chapter04\Exercise8;

use PHPUnit\Framework\TestCase;

class Exercise8Test extends TestCase
{
    public function test_equal_output_asserts_equal()
    {
        $expectedFirst = 'Felix GARY: "MEN IN BLACK: INTERNATIONAL","THE FATE OF THE FURIOUS","LAW ABIDING CITIZEN"';
        $expectedSecond = 'Kathryn BIGELOW: "DETROIT","LAST DAYS","THE HURT LOCKER"';
        $expectedThird = 'Martin SCORSESE: "ASHES AND DIAMONDS","THE LEOPARD","THE RIVER"';
        $expectedFour = 'Steven SPIELBERG: "ET","RAIDERS OF THE LOST ARK","SAVING PRIVATE RYAN"';
        $actual = $this->actual();
        $this->assertStringContainsString($expectedFirst, $actual);
        $this->assertStringContainsString($expectedSecond, $actual);
        $this->assertStringContainsString($expectedThird, $actual);
        $this->assertStringContainsString($expectedFour, $actual);
    }

    public function test_different_output_assert_not_equal()
    {
        $expected = 'Martin GARY: "MEN IN BLACK","ET","LAST DAYS"';
        $actual = $this->actual();
        $this->assertNotEquals($expected, $actual);
    }

    private function actual(): string
    {
        ob_start();
        include_once 'app/Chapter04/Exercise8/activity-functions.php';
        return ob_get_clean();
    }
}
