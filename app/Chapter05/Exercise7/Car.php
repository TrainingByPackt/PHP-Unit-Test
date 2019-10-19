<?php
require_once 'AbstractVehicle.php';
require_once 'DriveInterface.php';

class Car extends AbstractVehicle implements DriveInterface
{

    public $doors = 4;
    public $passengerCapacity = 5;
    public $steeringWheel = true;
    public $transmission = 'Manual';

    private $hasKeyinIgnition = true;

    public function start()
    {
        if ($this->hasKeyinIgnition) {
            $this->engineStatus = true;
        }
    }

    public function changeSpeed($speed)
    {
        echo "The car has been accelerated to " . $speed . " kph. " . PHP_EOL;
    }

    public function changeGear($gear)
    {
        echo "Shifted to gear number " . $gear . ". " . PHP_EOL;
    }

    public function applyBreak()
    {
        echo "All the 4 breaks in the wheels applied. " . PHP_EOL;
    }
}
