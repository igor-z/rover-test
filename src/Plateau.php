<?php

declare(strict_types=1);

namespace RoverTest;

class Plateau
{
    public function __construct(private readonly int $sizeX, private readonly int $sizeY)
    {
    }

    public function checkBounds(Position $position): void
    {
        if (
            $position->getX() > $this->sizeX
            || $position->getY() > $this->sizeY
            || $position->getX() < 0
            || $position->getY() < 0
        ) {
            throw new RoverOutOfPlateauException("Rover with coordinates ({$position->getX()}, {$position->getY()}) out of plateau");
        }
    }
}