<?php
namespace roverTest\parser;

use roverTest\Plateau;
use roverTest\Rover;
use roverTest\StateInterface;

class RoverCommandsParser
{
	private $lines;
	private $stateFactory;
	private $commandFactory;

	public function __construct(string $input, StateFactory $stateFactory, CommandFactory $commandFactory)
	{
		$this->lines = explode(\PHP_EOL, $input);
		$this->stateFactory = $stateFactory;
		$this->commandFactory = $commandFactory;
	}

	/**
	 * @return RoverCommandsStatement[]
	 * @throws ParseException
	 */
	public function parse()
	{
		$lines = $this->lines;
		$plateauLine = \array_shift($lines);
		$plateau = $this->parsePlateauLine($plateauLine);

		$statements = [];
		foreach (array_slice($this->lines, 1) as $i => $line) {
			if ($i % 2) {
				if (!isset($rover)) {
					throw new ParseException('Command sequence must be after rover initial state');
				}

				$commands = $this->parseCommandsLine($line);

				$statements[] = new RoverCommandsStatement($rover, $commands);
			} else {
				$rover = new Rover($this->parseStateLine($line), $plateau);
			}
		}

		return $statements;
	}

	private function parsePlateauLine(string $plateauLine) : Plateau
	{
		if (!$plateauLine) {
			throw new ParseException('The first line must contains a size of plateau');
		}

		$size = explode(' ', $plateauLine);

		if (count($size) != 2) {
			throw new ParseException("Wrong size of plateau format: \"{$plateauLine}\"");
		}

		return new Plateau($size[0], $size[1]);
	}

	private function parseStateLine(string $line) : StateInterface
	{
		if (!preg_match('/^(\d+)\s(\d+)\s(\w)$/', $line, $matches)) {
			throw new ParseException('Wrong rover initial state format');
		}

		return $this->stateFactory->create($matches[3], $matches[1], $matches[2]);
	}

	private function parseCommandsLine(string $line) : array
	{
		$lineLength = strlen($line);

		$commands = [];
		for ($i = 0; $i < $lineLength; $i++) {
			$commands[] = $this->commandFactory->create($line[$i]);
		}

		return $commands;
	}
}