<?php
namespace App\Chapter05\Exercise12;

use App\Chapter05\Exercise12\Vehicle\AbstractVehicle;
use App\Chapter05\Exercise12\Vehicle\DriveInterface;

class Motorcycle extends AbstractVehicle implements DriveInterface 
{
	public $noOfWheels =  2;
	public $stroke = 4;

	private $hasKey = true;
	private $hasKicked = true;


	public function start()
	{
		if($this->hasKey && $this->hasKicked) {
			$this->engineStatus = true;
		}
	}

	public function changeSpeed($speed)
	{
		echo "The motorcycle has been accelerated to ". $speed. " kph. "  . PHP_EOL;
	}

	public function changeGear($gear)
	{
		echo "Gear shifted to ". $gear. ". " . PHP_EOL;
	}

	public function applyBreak()
	{
			echo "The break applied. " . PHP_EOL;
	}

	function getPrice()
	{
		return $this->price - $this->price * 0.05;
	}
}
