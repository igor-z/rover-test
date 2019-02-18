<?php
namespace roverTest;

abstract class State implements StateInterface
{
	protected $x;
	protected $y;

	public function getX() : int
	{
		return $this->x;
	}

	public function getY() : int
	{
		return $this->y;
	}

	public function __construct($x, $y)
	{
		$this->x = $x;
		$this->y = $y;
	}
}