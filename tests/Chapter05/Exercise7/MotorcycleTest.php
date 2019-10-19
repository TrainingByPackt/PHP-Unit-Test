<?php

namespace Chapter05\Exercise7;

use PHPUnit\Framework\TestCase;
require_once 'app/Chapter05/Exercise7/Motorcycle.php';

class MotorcycleTest extends TestCase
{
    public function test_can_change_speed()
    {
        $motorcycle = $this->motorcycle();
        ob_start();
        $motorcycle->changeSpeed(45);
        $output = ob_get_clean();
        $this->assertStringContainsString('The motorcycle has been accelerated to 45 kph.', $output);
    }

    public function test_can_apply_break()
    {
        $motorcycle = $this->motorcycle();
        ob_start();
        $motorcycle->applyBreak();
        $output = ob_get_clean();
        $this->assertStringContainsString('The break applied.', $output);
    }

    public function test_can_change_gear()
    {
        $motorcycle = $this->motorcycle();
        ob_start();
        $motorcycle->changeGear(3);
        $output = ob_get_clean();
        $this->assertStringContainsString('Gear shifted to 3.', $output);
    }

    private function motorcycle(): \Motorcycle
    {
        return new \Motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');
    }
}
