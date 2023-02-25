<?php

declare(strict_types=1);

namespace RoverTest\Parser;

use RoverTest\Direction\East;
use RoverTest\Direction\North;
use RoverTest\Direction\South;
use RoverTest\Direction\West;
use RoverTest\Position;

class PositionFactory
{
    public function create(string $alias, int $x, int $y): Position
    {
        $direction = match ($alias) {
            'N' => new North(),
            'E' => new East(),
            'S' => new South(),
            'W' => new West(),
            default => throw new ParseException('Wrong rover landing direction'),
        };

        return new Position($direction, $x, $y);
    }
}