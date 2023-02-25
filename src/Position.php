<?php

declare(strict_types=1);

namespace RoverTest;

use RoverTest\Direction\DirectionInterface;

final class Position
{
    public function __construct(
        private DirectionInterface $direction,
        private int $x,
        private int $y
    ) {
    }

    public function move(): Position
    {
        return $this->direction->move($this);
    }

    public function moveEast(): Position
    {
        $newPosition = clone $this;
        ++$newPosition->x;

        return $newPosition;
    }

    public function moveNorth(): Position
    {
        $newPosition = clone $this;
        ++$newPosition->y;

        return $newPosition;
    }

    public function moveSouth(): Position
    {
        $newPosition = clone $this;
        --$newPosition->y;

        return $newPosition;
    }

    public function moveWest(): Position
    {
        $newPosition = clone $this;
        --$newPosition->x;

        return $newPosition;
    }

    public function rotateLeft(): Position
    {
        $newPosition = clone $this;
        $newPosition->direction = $this->direction->left();
        return $newPosition;
    }

    public function rotateRight(): Position
    {
        $newPosition = clone $this;
        $newPosition->direction = $this->direction->right();
        return $newPosition;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function getDirection(): DirectionInterface
    {
        return $this->direction;
    }
}