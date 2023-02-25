<?php

declare(strict_types=1);

namespace RoverTest;

class Rover
{
    public function __construct(private Position $position, private readonly Plateau $plateau)
    {
    }

    public function move(): void
    {
        $this->setPosition($this->position->move());
    }

    public function rotateLeft(): void
    {
        $this->setPosition($this->position->rotateLeft());
    }

    public function rotateRight(): void
    {
        $this->setPosition($this->position->rotateRight());
    }

    public function getPosition(): Position
    {
        return $this->position;
    }

    private function setPosition(Position $position): void
    {
        $this->position = $position;

        $this->plateau->checkBounds($this->position);
    }
}