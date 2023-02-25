<?php

declare(strict_types=1);

namespace RoverTest\Direction;

use RoverTest\Position;
use RoverTest\PositionPrinter;

class West implements DirectionInterface
{
    public function move(Position $position): Position
    {
        return $position->moveWest();
    }

    public function left(): DirectionInterface
    {
        return new South();
    }

    public function right(): DirectionInterface
    {
        return new North();
    }

    public function print(PositionPrinter $printer): string
    {
        return $printer->printWest();
    }
}