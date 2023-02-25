<?php

declare(strict_types=1);

namespace RoverTest\Parser;

use RoverTest\RoverCommand\RoverCommandInterface;
use RoverTest\Rover;

class RoverCommandsStatement
{
    private Rover $rover;
    private array $commands;

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