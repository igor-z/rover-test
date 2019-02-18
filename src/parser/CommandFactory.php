<?php
namespace roverTest\parser;

class CommandFactory
{
	public function create(string $alias) : RoverCommandInterface
	{
		$map = [
			'L' => RoverLeftCommand::class,
			'R' => RoverRightCommand::class,
			'M' => RoverMoveCommand::class,
		];

		if (!array_key_exists($alias, $map)) {
			throw new ParseException('Wrong rover command');
		}

		$commandClass = $map[$alias];

		return new $commandClass();
	}
}