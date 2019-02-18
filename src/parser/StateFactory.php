<?php
namespace roverTest\parser;

use roverTest\East;
use roverTest\North;
use roverTest\South;
use roverTest\StateInterface;
use roverTest\West;


class StateFactory
{
	public function create(string $alias, $x, $y) : StateInterface
	{
		$map = [
			'N' => North::class,
			'E' => East::class,
			'S' => South::class,
			'W' => West::class,
		];

		if (!array_key_exists($alias, $map)) {
			throw new ParseException('Wrong rover landing state');
		}

		$stateClass = $map[$alias];
		return new $stateClass($x, $y);
	}
}