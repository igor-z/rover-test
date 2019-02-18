<?php
namespace tests;

use roverTest\East;
use roverTest\Plateau;
use roverTest\Rover;
use roverTest\North;
use roverTest\RoverOutOfPlateauException;
use roverTest\South;
use roverTest\StateInterface;
use roverTest\West;

class RoverTest extends \Codeception\Test\Unit
{
    public function testMove()
    {
    	$testSets = [
		    [new North(1, 1), new North(1, 2)],
		    [new East(1, 1), new East(2, 1)],
		    [new South(1, 1), new South(1, 0)],
		    [new West(1, 1), new West(0, 1)],
	    ];

    	foreach ($testSets as $set) {
		    $rover = new Rover($set[0], new Plateau(5, 5));
		    $rover->move();

		    $this->assertState($set[1], $rover->getState());
	    }
    }

    public function testMoveNorthException()
    {
    	$this->expectException(RoverOutOfPlateauException::class);

	    $rover = new Rover(new North(2, 3), new Plateau(3, 3));
	    $rover->move();
    }

	public function testMoveEastException()
	{
		$this->expectException(RoverOutOfPlateauException::class);

		$rover = new Rover(new East(3, 2), new Plateau(3, 3));
		$rover->move();
	}

	public function testMoveSouthException()
	{
		$this->expectException(RoverOutOfPlateauException::class);

		$rover = new Rover(new South(2, 0), new Plateau(3, 3));
		$rover->move();
	}

	public function testMoveWestException()
	{
		$this->expectException(RoverOutOfPlateauException::class);

		$rover = new Rover(new West(0, 2), new Plateau(3, 3));
		$rover->move();
	}

	public function testRotateRight()
	{
		$testSets = [
			[new North(0, 0), new East(0, 0)],
			[new East(0, 0), new South(0, 0)],
			[new South(0, 0), new West(0, 0)],
			[new West(0, 0), new North(0, 0)],
		];

		foreach ($testSets as $set) {
			$rover = new Rover($set[0], new Plateau(5, 5));
			$rover->rotateRight();

			$this->assertState($set[1], $rover->getState());
		}
	}

    public function testRotateLeft()
    {
	    $testSets = [
		    [new North(0, 0), new West(0, 0)],
		    [new East(0, 0), new North(0, 0)],
		    [new South(0, 0), new East(0, 0)],
		    [new West(0, 0), new South(0, 0)],
	    ];

	    foreach ($testSets as $set) {
		    $rover = new Rover($set[0], new Plateau(5, 5));
		    $rover->rotateLeft();

		    $this->assertState($set[1], $rover->getState());
	    }
    }

	private function assertState(StateInterface $expectedState, StateInterface $state)
	{
		$this->assertInstanceOf(get_class($expectedState), $state);
		$this->assertEquals($expectedState->getX(), $state->getX());
		$this->assertEquals($expectedState->getY(), $state->getY());
	}
}