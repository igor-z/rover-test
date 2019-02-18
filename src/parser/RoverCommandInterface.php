<?php
namespace roverTest\parser;

use roverTest\Rover;

interface RoverCommandInterface
{
	function execute(Rover $rover);
}