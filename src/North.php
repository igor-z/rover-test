<?php
namespace roverTest;

class North extends State
{
	public function move(Rover $rover)
	{
		$rover->setState(new North($this->x, $this->y + 1));
	}

	public function rotateLeft(Rover $rover)
	{
		$rover->setState(new West($this->x, $this->y));
	}

	public function rotateRight(Rover $rover)
	{
		$rover->setState(new East($this->x, $this->y));
	}
}