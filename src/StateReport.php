<?php
namespace roverTest;

class StateReport
{
	private $state;

	public function __construct(StateInterface $state)
	{
		$this->state = $state;
	}

	public function report()
	{
		$map = [
			North::class => 'N',
			South::class => 'S',
			East::class => 'E',
			West::class => 'W',
		];

		$stateClass = \get_class($this->state);

		if (!\array_key_exists($stateClass, $map)) {
			throw new ReportException('Unknown rover state');
		}

		return $this->state->getX().' '. $this->state->getY().' '.$map[$stateClass];
	}
}