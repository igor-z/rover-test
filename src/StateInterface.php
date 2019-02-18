<?php
namespace roverTest;

interface StateInterface
{
	function move(Rover $rover);
	function rotateLeft(Rover $rover);
	function rotateRight(Rover $rover);
	function getX() : int;
	function getY() : int;
}