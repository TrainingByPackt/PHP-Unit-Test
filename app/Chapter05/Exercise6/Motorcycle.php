<?php

require_once 'AbstractVehicle.php';

class Motorcycle extends AbstractVehicle
{
    public $noOfWheels =  2;
    public $stroke = 4;

    private $hasKey = true;
    private $hasKicked = true;


    public function start()
    {
        if ($this->hasKey && $this->hasKicked) {
            $this->engineStatus = true;
        }
    }
}
