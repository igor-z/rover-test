<?php

declare(strict_types=1);

namespace RoverTest\RoverCommand;

use RoverTest\Rover;

interface RoverCommandInterface
{
    public function execute(Rover $rover): void;
}