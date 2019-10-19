<?php
namespace App\Chapter05\Exercise12\Traits;

trait PriceTrait  
{
	public function getPrice()
	{
		return $this->price;
	}

	public function setPrice($price)
	{
		$this->price = $price;
	}
}