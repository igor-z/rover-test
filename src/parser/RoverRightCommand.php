<?php
namespace roverTest\parser;

use roverTest\Rover;

class RoverRightCommand implements RoverCommandInterface
{
	public function execute(Rover $rover)
	{
		$rover->rotateRight();
	}
}