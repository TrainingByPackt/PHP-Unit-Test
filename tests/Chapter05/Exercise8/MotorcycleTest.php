<?php

namespace Chapter05\Exercise8;

use PHPUnit\Framework\TestCase;
require_once 'app/Chapter05/Exercise8/Motorcycle.php';

class MotorcycleTest extends TestCase
{
    public function test_can_set_and_get_price()
    {
        $expected = 4750.0;
        $motorcycle = $this->motorcycle();
        $motorcycle->setPrice(5000);
        $this->assertEquals($expected, $motorcycle->getPrice());
    }

    private function motorcycle(): \Motorcycle
    {
        return new \Motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');
    }
}
