<?php

namespace Chapter05\Exercise2;

use PHPUnit\Framework\TestCase;

require_once 'app/Chapter05/Exercise2/Vehicle.php';

class VehicleTest extends TestCase
{
    public function test_can_create_and_get_default_properties()
    {
        $actual = new \Vehicle();
        $this->assertInstanceOf(\Vehicle::class, $actual);
        $this->assertEquals('DefaultMake', $actual->getMake());
        $this->assertEquals('DefaultModel', $actual->getModel());
        $this->assertEquals('DefaultColor', $actual->getColor());
        $this->assertEquals(4, $actual->getNoOfWheels());
        $this->assertEquals('XXXXXXXX', $actual->getEngineNumber());
    }

    public function test_can_create_set_and_get_properties()
    {
        $expectedMake = 'Honda';
        $expectedModel = 'Civic';
        $expectedColor = 'Red';
        $expectedNumberOfWheels = 4;
        $expectedEngineNumber = '23CJ4567';
        $actual = new \Vehicle($expectedMake, $expectedModel, $expectedColor, $expectedNumberOfWheels, $expectedEngineNumber);
        $this->assertInstanceOf(\Vehicle::class, $actual);
        $this->assertEquals($expectedMake, $actual->getMake());
        $this->assertEquals($expectedModel, $actual->getModel());
        $this->assertEquals($expectedColor, $actual->getColor());
        $this->assertEquals($expectedNumberOfWheels, $actual->getNoOfWheels());
        $this->assertEquals($expectedEngineNumber, $actual->getEngineNumber());

        $actual->setNoOfWheels(3);
        $this->assertEquals(3, $actual->getNoOfWheels());
    }
}
