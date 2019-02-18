<?php
namespace roverTest\parser;

use roverTest\Rover;

class RoverLeftCommand implements RoverCommandInterface
{
	public function execute(Rover $rover)
	{
		$rover->rotateLeft();
	}
}