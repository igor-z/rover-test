<?php
namespace roverTest\parser;

use roverTest\Rover;

class RoverCommandsStatement
{
	private $rover;
	private $commands;

	/**
	 * @return RoverCommandInterface[]
	 */
	public function getCommands(): array
	{
		return $this->commands;
	}

	public function getRover(): Rover
	{
		return $this->rover;
	}

	public function __construct(Rover $rover, array $commands = [])
	{
		$this->rover = $rover;
		$this->commands = $commands;
	}
}