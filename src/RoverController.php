<?php
namespace roverTest;

use roverTest\parser\CommandFactory;
use roverTest\parser\RoverCommandsParser;
use roverTest\parser\StateFactory;

class RoverController
{
	public function handleInput(string $input) : string
	{
		$parser = new RoverCommandsParser($input, new StateFactory(), new CommandFactory());

		$outputLines = [];
		foreach ($parser->parse() as $statement) {
			$rover = $statement->getRover();
			foreach ($statement->getCommands() as $command) {
				$command->execute($rover);
			}

			$stateReport = new StateReport($rover->getState());
			$outputLines[] = $stateReport->report();
		}

		return implode("\n", $outputLines);
	}
}