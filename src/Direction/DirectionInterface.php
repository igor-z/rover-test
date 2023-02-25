<?php

declare(strict_types=1);

namespace RoverTest\Direction;

use RoverTest\Position;
use RoverTest\PositionPrinter;

interface DirectionInterface
{
    public function move(Position $position): Position;
    public function left(): DirectionInterface;
    public function right(): DirectionInterface;
    public function print(PositionPrinter $printer): string;
}