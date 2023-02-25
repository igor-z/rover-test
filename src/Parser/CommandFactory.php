<?php

declare(strict_types=1);

namespace RoverTest\Parser;

use RoverTest\RoverCommand\RoverCommandInterface;
use RoverTest\RoverCommand\RoverLeftCommand;
use RoverTest\RoverCommand\RoverMoveCommand;
use RoverTest\RoverCommand\RoverRightCommand;

class CommandFactory
{
    public function create(string $alias): RoverCommandInterface
    {
        return match ($alias) {
            'L' => new RoverLeftCommand(),
            'R' => new RoverRightCommand(),
            'M' => new RoverMoveCommand(),
            default => throw new ParseException('Wrong rover command')
        };
    }
}