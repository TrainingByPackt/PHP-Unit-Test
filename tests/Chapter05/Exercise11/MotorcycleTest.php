<?php

namespace Chapter05\Exercise11;

use PHPUnit\Framework\TestCase;
require_once 'app/Chapter05/Exercise11/Motorcycle.php';

class MotorcycleTest extends TestCase
{
    public function test_can_set_and_get_price()
    {
        $expected = 7600.0;
        $motorcycle = $this->motorcycle();
        $motorcycle->setPrice(8000);
        $this->assertEquals($expected, $motorcycle->getPrice());
    }

    private function motorcycle(): \Motorcycle
    {
        return new \Motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');
    }
}
