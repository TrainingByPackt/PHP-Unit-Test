<?php

namespace Chapter05\Exercise12;

use PHPUnit\Framework\TestCase;
use App\Chapter05\Exercise12\Motorcycle;

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
        $motorcycle = $this->motorcycle();
        $motorcycle->stop();
        $this->assertFalse($motorcycle->getEngineStatus());
    }

    public function test_can_change_speed()
    {
        $motorcycle = $this->motorcycle();
        ob_start();
        $motorcycle->changeSpeed(65);
        $output = ob_get_clean();
        $this->assertStringContainsString('The motorcycle has been accelerated to 65 kph.', $output);
    }

    public function test_can_apply_break()
    {
        $motorcycle = $this->motorcycle();
        ob_start();
        $motorcycle->applyBreak();
        $output = ob_get_clean();
        $this->assertStringContainsString('The break applied.', $output);
    }

    public function test_can_change_gear()
    {
        $motorcycle = $this->motorcycle();
        ob_start();
        $motorcycle->changeGear(1);
        $output = ob_get_clean();
        $this->assertStringContainsString('Gear shifted to 1.', $output);
    }

    public function test_can_set_and_get_price()
    {
        $expected = 4750.0;
        $motorcycle = $this->motorcycle();
        $motorcycle->setPrice(5000);
        $this->assertEquals($expected, $motorcycle->getPrice());
    }

    private function motorcycle(): Motorcycle
    {
        return new Motorcycle('Kawasaki', 'Ninja', 'Orange', 2, '53WVC14598');
    }
}
