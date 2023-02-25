<?php

declare(strict_types=1);

namespace RoverTest\Direction;

use RoverTest\Position;
use RoverTest\PositionPrinter;

class South implements DirectionInterface
{
    public function move(Position $position): Position
    {
        return $position->moveSouth();
    }

    public function left(): DirectionInterface
    {
        return new East();
    }

    public function right(): DirectionInterface
    {
        return new West();
    }

    public function print(PositionPrinter $printer): string
    {
        return $printer->printSouth();
    }
}