<?php

namespace Chapter05\Exercise5;

use PHPUnit\Framework\TestCase;
require_once 'app/Chapter05/Exercise5/Car.php';

class CarTest extends TestCase
{
    public function test_can_create()
    {
        \Car::$counter = 0;
        $instanceOne = $this->car('Honda', 'Civic', 'Red', 4, '23CJ4567');
        $instanceTwo = $this->car('Toyota', 'Allion', 'White', 4, '24CJ4568');
        $instanceThree = $this->car('Hyundai', 'Elantra', 'Black', 4, '24CJ1234');
        $instanceFour = $this->car('Chevrolet', 'Camaro', 'Yellow', 4, '23CJ9397');

        $this->assertEquals(4, \Car::$counter);
    }

    private function car(string $make, string $model, string $color, int $noOfWheels, string $engineNumber): \Car
    {
        return new \Car($make, $model, $color, $noOfWheels, $engineNumber);
    }
}
