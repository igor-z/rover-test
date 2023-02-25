<?php

declare(strict_types=1);

namespace RoverTest;

use RoverTest\Parser\CommandFactory;
use RoverTest\Parser\PositionFactory;
use RoverTest\Parser\RoverCommandsParser;

class RoverController
{
    public function handleInput(string $input): string
    {
        $parser = new RoverCommandsParser($input, new PositionFactory(), new CommandFactory());

        $outputLines = [];
        foreach ($parser->parse() as $statement) {
            $rover = $statement->getRover();
            foreach ($statement->getCommands() as $command) {
                $command->execute($rover);
            }

            $positionPrinter = new PositionPrinter($rover->getPosition());
            $outputLines[] = $positionPrinter->print();
        }

        return implode("\n", $outputLines);
    }
}