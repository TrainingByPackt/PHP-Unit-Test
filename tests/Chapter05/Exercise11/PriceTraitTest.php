<?php

namespace Chapter05\Exercise11;

use PHPUnit\Framework\TestCase;
require_once 'app/Chapter05/Exercise11/PriceTrait.php';

class PriceTraitTest extends TestCase
{
    public function test_can_set_and_get_price()
    {
        $expected = 8000;
        $actual = $this->instance($expected);
        $this->assertEquals($expected, $actual->getPrice());
    }

    private function instance(int $price)
    {
        return new class($price) {
            use \PriceTrait;

            public function __construct(int $price)
            {
                $this->setPrice($price);
            }
        };
    }
}
