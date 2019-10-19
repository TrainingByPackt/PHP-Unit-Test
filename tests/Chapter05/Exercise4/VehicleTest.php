<?php

namespace Chapter05\Exercise4;

use PHPUnit\Framework\TestCase;
use Error;
require_once 'app/Chapter05/Exercise4/Vehicle.php';

class VehicleTest extends TestCase
{
    /** @var \Vehicle */
    private $vehicle;

    public function test_can_create()
    {
        $actual = $this->vehicle;
        $this->assertInstanceOf(\Vehicle::class, $actual);
        $this->assertEquals('Honda', $actual->make);
        $this->assertEquals('Civic', $actual->model);
        $this->assertEquals('Red', $actual->color);
        $this->assertEquals(4, $actual->getNoOfWheels());
        $this->assertEquals('23CJ4567', $actual->getEngineNumber());

        $actual->setEngineNumber('23CJ4596');
        $this->assertEquals('23CJ4596', $actual->getEngineNumber());
    }

    public function test_no_of_wheels_access_returns_exception()
    {
        $actual = $this->vehicle;
        $this->expectException(Error::class);
        $actual->noOfWheels;
    }

    public function test_engine_number_access_returns_exception()
    {
        $actual = $this->vehicle;
        $this->assertEquals('23CJ4567', $actual->getEngineNumber());
        $this->expectException(Error::class);
        $actual->engineNumber;
    }

    public function setUp(): void
    {
        parent::setUp();
        $this->vehicle = new \Vehicle('Honda', 'Civic', 'Red', 4, '23CJ4567');
    }
}
