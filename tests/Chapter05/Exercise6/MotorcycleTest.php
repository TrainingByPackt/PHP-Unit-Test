<?php

namespace Chapter05\Exercise6;

use PHPUnit\Framework\TestCase;
require_once 'app/Chapter05/Exercise6/Motorcycle.php';

class MotorcycleTest extends TestCase
{
    public function test_can_start()
    {
        $motorcycle = $this->motorcycle();
        $motorcycle->start();
        $this->assertTrue($motorcycle->getEngineStatus());
    }

    public function test_can_stop()
    {
        $car = $this->motorcycle();
        $car->stop();
        $this->assertFalse($car->getEngineStatus());
    }

    private function motorcycle(): \Motorcycle
    {
        return new \Motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');
    }
}
