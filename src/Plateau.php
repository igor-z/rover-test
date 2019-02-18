<?php
namespace roverTest;

class Plateau
{
	private $maxX;
	private $maxY;

	public function __construct(int $maxX, int $maxY)
	{
		$this->maxX = $maxX;
		$this->maxY = $maxY;
	}

	public function roverChanged(Rover $rover)
	{
		$state = $rover->getState();

		if (
			$state->getX() > $this->maxX
			|| $state->getY() > $this->maxY
			|| $state->getX() < 0
			|| $state->getY() < 0
		) {
			throw new RoverOutOfPlateauException("Rover with coordinates ({$state->getX()}, {$state->getY()}) out of plateau");
		}
	}
}