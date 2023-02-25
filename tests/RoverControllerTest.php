<?php

namespace Tests;

use RoverTest\RoverController;

class RoverControllerTest extends \Codeception\Test\Unit
{
    public function testHandleInput(): void
    {
        $controller = new RoverController();
        $input = <<<INPUT
        5 5
        1 2 N
        LMLMLMLMM
        3 3 E
        MMRMMRMRRM
        INPUT;

        $output = $controller->handleInput($input);

        $expected = <<<OUTPUT
        1 3 N
        5 1 E
        OUTPUT;
        $this->assertEquals($expected, $output);
    }
}