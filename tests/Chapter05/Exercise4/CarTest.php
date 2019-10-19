<?php

namespace Chapter05\Exercise4;

use PHPUnit\Framework\TestCase;
use Error;
require_once 'app/Chapter05/Exercise4/Car.php';

class CarTest extends TestCase
{
    /** @var \Car */
    private $car;

    public function test_can_create()
    {
        $actual = $this->car;
        $this->assertInstanceOf(\Car::class, $actual);
        $this->assertEquals('Honda', $actual->make);
        $this->assertEquals('Civic', $actual->model);
        $this->assertEquals('Red', $actual->color);
        $this->assertEquals(4, $actual->getNoOfWheels());
        $this->assertEquals('23CJ4567', $actual->getEngineNumber());
        $this->assertEquals('Manual', $actual->transmission);
        $this->assertEquals(5, $actual->passengerCapacity);
        $this->assertEquals(4, $actual->doors);
        $this->assertTrue($actual->steeringWheel);

        $actual->transmission = 'Automatic';
        $this->assertEquals('Automatic', $actual->transmission);
        $actual->passengerCapacity = 8;
        $this->assertEquals(8, $actual->passengerCapacity);
        $actual->doors = 2;
        $this->assertEquals(2, $actual->doors);
        $actual->steeringWheel = false;
        $this->assertFalse($actual->steeringWheel);
    }

    public function test_no_of_wheels_access_returns_exception()
    {
        $actual = $this->car;
        $this->expectException(Error::class);
        $actual->noOfWheels;
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->car = new \Car('Honda', 'Civic', 'Red', 4, '23CJ4567');
    }
}
