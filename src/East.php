<?php
namespace roverTest;

class East extends State
{
	public function move(Rover $rover)
	{
		$rover->setState(new East($this->x + 1, $this->y));
	}

	public function rotateLeft(Rover $rover)
	{
		$rover->setState(new North($this->x, $this->y));
	}

	public function rotateRight(Rover $rover)
	{
		$rover->setState(new South($this->x, $this->y));
	}
}