<?php

namespace Chapter05\Exercise9;

use PHPUnit\Framework\TestCase;
require_once 'app/Chapter05/Exercise9/Car.php';

class CarTest extends TestCase
{
    public function test_can_set_owner_nme_property_value()
    {
        $expected = 'John Doe';
        $car = $this->car();
        $car->ownerName = $expected;
        $this->assertStringContainsString($expected, $car->ownerName);
    }

    public function test_can_set_year_property_value()
    {
        $expected = 2015;
        $car = $this->car();
        $car->year = $expected;
        $this->assertEquals($expected, $car->year);
    }

    public function test_can_honk_with_no_argument()
    {
        $car = $this->car();
        ob_start();
        $car->honk();
        $output = ob_get_clean();
        $this->assertStringContainsString('Honking...', $output);
    }

    public function test_can_honk_with_one_argument()
    {
        $car = $this->car();
        ob_start();
        $car->honk('gently');
        $output = ob_get_clean();
        $this->assertStringContainsString('Honking gently... ', $output);
    }

    public function test_can_honk_with_two_arguments()
    {
        $car = $this->car();
        ob_start();
        $car->honk('louder', 'siren');
        $output = ob_get_clean();
        $this->assertStringContainsString('Honking louder... ' . PHP_EOL . 'siren enabled... ', $output);
    }

    private function car(): \Car
    {
        return new \Car('Honda', 'Civic', 'Red', 4, '23CJ4567');
    }
}
