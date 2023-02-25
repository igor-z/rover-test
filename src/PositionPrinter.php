<?php

declare(strict_types=1);

namespace RoverTest;

class PositionPrinter
{
    public function __construct(private readonly Position $position)
    {
    }

    public function print(): string
    {
        return $this->position->getX().' '. $this->position->getY().' '.$this->position->getDirection()->print($this);
    }

    public function printNorth(): string
    {
        return 'N';
    }

    public function printSouth(): string
    {
        return 'S';
    }

    public function printEast(): string
    {
        return 'E';
    }

    public function printWest(): string
    {
        return 'W';
    }
}