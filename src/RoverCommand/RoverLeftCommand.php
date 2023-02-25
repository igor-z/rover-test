<?php

declare(strict_types=1);

namespace RoverTest\RoverCommand;

use RoverTest\Rover;

class RoverLeftCommand implements RoverCommandInterface
{
    public function execute(Rover $rover): void
    {
        $rover->rotateLeft();
    }
}