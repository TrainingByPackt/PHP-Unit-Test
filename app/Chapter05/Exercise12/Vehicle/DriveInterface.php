<?php
namespace App\Chapter05\Exercise12\Vehicle;

interface DriveInterface 
{
	public function changeSpeed($speed);
	public function changeGear($gear);
	public function applyBreak();
}