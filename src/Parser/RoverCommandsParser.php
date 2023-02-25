<?php

declare(strict_types=1);

namespace RoverTest\Parser;

use RoverTest\Plateau;
use RoverTest\Position;
use RoverTest\Rover;

/**
 * Expected input:
 * 5 5 -- plateau size
 * 1 2 N -- landing position. N - north, E - east, S - south, W - west
 * LMLMLMLMM -- command sequence. L - rotate left, R - rotate right, M - move forward
 * 3 3 E -- landing position
 * MMRMMRMRRM -- command sequence
 */
class RoverCommandsParser
{
    private array $lines;

    public function __construct(string $input, private readonly PositionFactory $positionFactory, private readonly  CommandFactory $commandFactory)
    {
        $this->lines = explode(\PHP_EOL, $input);
    }

    /**
     * @return RoverCommandsStatement[]
     * @throws ParseException
     */
    public function parse(): array
    {
        $lines = $this->lines;
        $plateauLine = \array_shift($lines);
        $plateau = $this->parsePlateauSizeLine($plateauLine);

        $statements = [];
        foreach (array_slice($this->lines, 1) as $i => $line) {
            if ($i % 2) {
                if (!isset($rover)) {
                    throw new ParseException('Command sequence must be after rover initial position');
                }

                $commands = $this->parseCommandsLine($line);

                $statements[] = new RoverCommandsStatement($rover, $commands);
            } else {
                $rover = new Rover($this->parsePositionLine($line), $plateau);
            }
        }

        return $statements;
    }

    private function parsePlateauSizeLine(string $plateauLine): Plateau
    {
        if (!$plateauLine) {
            throw new ParseException('The first line must contains a size of plateau');
        }

        $size = explode(' ', $plateauLine);

        if (count($size) !== 2) {
            throw new ParseException("Wrong size of plateau format: \"$plateauLine\"");
        }

        return new Plateau((int) $size[0], (int) $size[1]);
    }

    private function parsePositionLine(string $line): Position
    {
        if (!preg_match('/^(\d+)\s(\d+)\s(\w)$/', $line, $matches)) {
            throw new ParseException('Wrong rover initial position format');
        }

        return $this->positionFactory->create($matches[3], (int) $matches[1], (int) $matches[2]);
    }

    private function parseCommandsLine(string $line): array
    {
        $lineLength = strlen($line);

        $commands = [];
        for ($i = 0; $i < $lineLength; $i++) {
            $commands[] = $this->commandFactory->create($line[$i]);
        }

        return $commands;
    }
}