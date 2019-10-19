<?php

namespace Chapter05\Exercise7;

use PHPUnit\Framework\TestCase;
require_once 'app/Chapter05/Exercise7/Car.php';

class CarTest extends TestCase
{
    public function test_can_change_speed()
    {
        $car = $this->car();
        ob_start();
        $car->changeSpeed(65);
        $output = ob_get_clean();
        $this->assertStringContainsString('The car has been accelerated to 65 kph.', $output);
    }

    public function test_can_apply_break()
    {
        $car = $this->car();
        ob_start();
        $car->applyBreak();
        $output = ob_get_clean();
        $this->assertStringContainsString('All the 4 breaks in the wheels applied.', $output);
    }

    public function test_can_change_gear()
    {
        $car = $this->car();
        ob_start();
        $car->changeGear(4);
        $output = ob_get_clean();
        $this->assertStringContainsString('Shifted to gear number 4.', $output);
    }

    private function car(): \Car
    {
        return new \Car('Honda', 'Civic', 'Red', 4, '23CJ4567');
    }
}
