<?php

namespace Chapter05\Exercise12;

use PHPUnit\Framework\TestCase;
use App\Chapter05\Exercise12\Car;

class CarTest extends TestCase
{
    public function test_can_start()
    {
        $car = $this->car();
        $car->start();
        $this->assertTrue($car->getEngineStatus());
    }

    public function test_can_stop()
    {
        $car = $this->car();
        $car->stop();
        $this->assertFalse($car->getEngineStatus());
    }

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
        $car->changeGear(1);
        $output = ob_get_clean();
        $this->assertStringContainsString('Shifted to gear number 1.', $output);
    }

    private function car(): Car
    {
        return new Car('Honda', 'Civic', 'Red', 4, '23CJ4567');
    }
}
