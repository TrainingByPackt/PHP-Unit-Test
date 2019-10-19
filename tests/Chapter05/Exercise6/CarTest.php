<?php

namespace Chapter05\Exercise6;

use PHPUnit\Framework\TestCase;
require_once 'app/Chapter05/Exercise6/Car.php';

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

    private function car(): \Car
    {
        return new \Car('Honda', 'Civic', 'Red', 4, '23CJ4567');
    }
}
