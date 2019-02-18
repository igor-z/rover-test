<?php
namespace roverTest\parser;

use roverTest\Rover;

class RoverMoveCommand implements RoverCommandInterface
{
	public function execute(Rover $rover)
	{
		$rover->move();
	}
}