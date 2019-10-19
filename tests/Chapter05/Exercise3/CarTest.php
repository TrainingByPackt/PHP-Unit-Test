<?php

namespace Chapter05\Exercise3;

use PHPUnit\Framework\TestCase;

require_once 'app/Chapter05/Exercise3/Car.php';

class CarTest extends TestCase
{
    public function test_can_create_set_and_get_properties()
    {
        $expectedMake = 'Ford';
        $expectedModel = 'Fiesta';
        $expectedColor = 'Blue';
        $expectedNumberOfWheels = 4;
        $expectedEngineNumber = '42CJ4556';
        $actual = new \Car($expectedMake, $expectedModel, $expectedColor, $expectedNumberOfWheels, $expectedEngineNumber);
        $this->assertInstanceOf(\Car::class, $actual);
        $this->assertEquals($expectedMake, $actual->getMake());
        $this->assertEquals($expectedModel, $actual->getModel());
        $this->assertEquals($expectedColor, $actual->getColor());
        $this->assertEquals($expectedNumberOfWheels, $actual->getNoOfWheels());
        $this->assertEquals($expectedEngineNumber, $actual->getEngineNumber());

        $actual->setColor('orange');
        $this->assertEquals('orange', $actual->getColor());
    }
}
