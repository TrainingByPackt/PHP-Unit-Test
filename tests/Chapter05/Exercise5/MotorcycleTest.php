<?php

namespace Chapter05\Exercise5;

use PHPUnit\Framework\TestCase;
require_once 'app/Chapter05/Exercise5/Motorcycle.php';

class MotorcycleTest extends TestCase
{
    public function test_can_create()
    {
        \Motorcycle::$counter = 0;
        $instanceOne = $this->motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');
        $instanceTwo = $this->motorcycle('Suzuki', 'Gixxer SF', 'Blue', 2, '53WVC14599');
        $instanceThree = $this->motorcycle('Harley Davidson', 'Street 750', 'Black', 2,   '53WVC14234');

        $this->assertEquals(3, \Motorcycle::$counter);
    }

    private function motorcycle(string $make, string $model, string $color, int $noOfWheels, string $engineNumber): \Motorcycle
    {
        return new \Motorcycle($make, $model, $color, $noOfWheels, $engineNumber);
    }
}
