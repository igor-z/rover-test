<?php

declare(strict_types=1);

namespace RoverTest\Direction;

use RoverTest\Position;
use RoverTest\PositionPrinter;

class East implements DirectionInterface
{
    public function move(Position $position): Position
    {
        return $position->moveEast();
    }

    public function left(): DirectionInterface
    {
        return new North();
    }

    public function right(): DirectionInterface
    {
        return new South();
    }

    public function print(PositionPrinter $printer): string
    {
        return $printer->printEast();
    }
}