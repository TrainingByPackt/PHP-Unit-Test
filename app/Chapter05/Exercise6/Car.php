<?php
require_once 'AbstractVehicle.php';

class Car extends AbstractVehicle
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
}
