<?php

// Class

class Pastry
{
	public $ingredients = ['flour', 'water', 'sugar', 'eggs'];
	public $typeOfPastry;

	public function __construct($typeOfPastry)
	{
		$this->typeOfPastry = $typeOfPastry;
		$this->bake();
	}

	public function bake ()
	{
		// accesses oven API
	}

	public function serve ()
	{
		// put on plate API and serve
	}
}

// Child class of pastry (this below actually needs to be in a separate file)
class Doughnut extends Pastry
{
	$typeOfPastry = 'doughnut';

	public function __construct($flavor)
	{
		$this->flavor = $flavor;
		$this->bake();
	}

	public function glaze($glazeFlavor)
	{
		//add glaze to top of doughnut
	}

}
