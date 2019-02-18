<?php
namespace roverTest;

class Rover
{
	private $plateau;
	private $state;

	public function __construct(StateInterface $state, Plateau $plateau)
	{
		$this->state = $state;
		$this->plateau = $plateau;
	}

	public function move()
	{
		$this->state->move($this);
	}

	public function rotateLeft()
	{
		$this->state->rotateLeft($this);
	}

	public function rotateRight()
	{
		$this->state->rotateRight($this);
	}

	public function setState(StateInterface $state)
	{
		$this->state = $state;

		$this->plateau->roverChanged($this);
	}

	public function getState()
	{
		return $this->state;
	}
}