<?php

namespace Chapter05\Exercise3;

use PHPUnit\Framework\TestCase;

require_once 'app/Chapter05/Exercise3/Motorcycle.php';

class MotorcycleTest extends TestCase
{
    public function test_can_create_set_and_get_properties()
    {
        $expectedMake = 'Kawasaki';
        $expectedModel = 'Ninja';
        $expectedColor = 'Orange';
        $expectedNumberOfWheels = 2;
        $expectedEngineNumber = '53WVC14598';
        $actual = new \Motorcycle($expectedMake, $expectedModel, $expectedColor, $expectedNumberOfWheels, $expectedEngineNumber);
        $this->assertInstanceOf(\Motorcycle::class, $actual);
        $this->assertEquals($expectedMake, $actual->getMake());
        $this->assertEquals($expectedModel, $actual->getModel());
        $this->assertEquals($expectedColor, $actual->getColor());
        $this->assertEquals($expectedNumberOfWheels, $actual->getNoOfWheels());
        $this->assertEquals($expectedEngineNumber, $actual->getEngineNumber());

        $actual->setModel('Samurai');
        $this->assertEquals('Samurai', $actual->getModel());
    }
}
