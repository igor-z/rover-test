<?php namespace tests;

use roverTest\RoverController;

class RoverControllerTest extends \Codeception\Test\Unit
{
    public function testHandleInput()
    {
		$controller = new RoverController();
		$output = $controller->handleInput(<<<INPUT
5 5
1 2 N
LMLMLMLMM
3 3 E
MMRMMRMRRM
INPUT
);

		$expected = <<<OUTPUT
1 3 N
5 1 E
OUTPUT;
		$this->assertEquals($expected, $output);
    }
}