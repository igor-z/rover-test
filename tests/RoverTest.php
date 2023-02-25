<?php

namespace Tests;

use Generator;
use RoverTest\Direction\East;
use RoverTest\Direction\North;
use RoverTest\Direction\South;
use RoverTest\Direction\West;
use RoverTest\Plateau;
use RoverTest\Position;
use RoverTest\Rover;
use RoverTest\RoverOutOfPlateauException;

class RoverTest extends \Codeception\Test\Unit
{
    /**
     * @dataProvider moveDataProvider
     */
    public function testMove(Position $expected, Position $initial): void
    {
        $rover = new Rover($initial, new Plateau(5, 5));
        $rover->move();

        $this->assertPosition($expected, $rover->getPosition());
    }

    public function moveDataProvider(): Generator
    {
        yield [
            new Position(new North(), 1, 2),
            new Position(new North(), 1, 1),
        ];
        yield [
            new Position(new East(), 2, 1),
            new Position(new East(), 1, 1),
        ];
        yield [
            new Position(new South(), 1, 0),
            new Position(new South(), 1, 1),
        ];
        yield [
            new Position(new West(), 0, 1),
            new Position(new West(), 1, 1),
        ];
    }

    public function testMoveNorthException(): void
    {
        $this->expectException(RoverOutOfPlateauException::class);

        $rover = new Rover(new Position(new North(), 2, 3), new Plateau(3, 3));
        $rover->move();
    }

    public function testMoveEastException(): void
    {
        $this->expectException(RoverOutOfPlateauException::class);

        $rover = new Rover(new Position(new East(), 3, 2), new Plateau(3, 3));
        $rover->move();
    }

    public function testMoveSouthException(): void
    {
        $this->expectException(RoverOutOfPlateauException::class);

        $rover = new Rover(new Position(new South(), 2, 0), new Plateau(3, 3));
        $rover->move();
    }

    public function testMoveWestException(): void
    {
        $this->expectException(RoverOutOfPlateauException::class);

        $rover = new Rover(new Position(new West(), 0, 2), new Plateau(3, 3));
        $rover->move();
    }

    /**
     * @dataProvider rotateRightDataProvider
     */
    public function testRotateRight(Position $expectedPosition, Position $initialPosition): void
    {
        $rover = new Rover($initialPosition, new Plateau(5, 5));
        $rover->rotateRight();

        $this->assertPosition($expectedPosition, $rover->getPosition());
    }

    public function rotateRightDataProvider(): Generator
    {
        yield [
            new Position(new East(), 0, 0),
            new Position(new North(), 0, 0),
        ];
        yield [
            new Position(new South(), 0, 0),
            new Position(new East(), 0, 0),
        ];
        yield [
            new Position(new West(), 0, 0),
            new Position(new South(), 0, 0),
        ];
        yield [
            new Position(new North(), 0, 0),
            new Position(new West(), 0 ,0),
        ];
    }

    /**
     * @dataProvider rotateLeftDataProvider
     */
    public function testRotateLeft(Position $expectedPosition, Position $initialPosition): void
    {
        $rover = new Rover($initialPosition, new Plateau(5, 5));
        $rover->rotateLeft();

        $this->assertPosition($expectedPosition, $rover->getPosition());
    }

    public function rotateLeftDataProvider(): Generator
    {
        yield [
            new Position(new North(), 0, 0),
            new Position(new West(), 0, 0),
        ];
        yield [
            new Position(new East(), 0, 0),
            new Position(new North(), 0, 0),
        ];
        yield [
            new Position(new South(), 0, 0),
            new Position(new East(), 0, 0),
        ];
        yield [
            new Position(new West(), 0, 0),
            new Position(new South(), 0 ,0),
        ];
    }

    private function assertPosition(Position $expectedPosition, Position $position): void
    {
        $this->assertInstanceOf(get_class($expectedPosition), $position);
        $this->assertEquals($expectedPosition->getX(), $position->getX());
        $this->assertEquals($expectedPosition->getY(), $position->getY());
    }
}