<?php

declare(strict_types=1);

namespace RoverTest\Direction;

use RoverTest\Position;
use RoverTest\PositionPrinter;

class North implements DirectionInterface
{
    public function move(Position $position): Position
    {
        return $position->moveNorth();
    }

    public function left(): DirectionInterface
    {
        return new West();
    }

    public function right(): DirectionInterface
    {
        return new East();
    }

    public function print(PositionPrinter $printer): string
    {
        return $printer->printNorth();
    }
}