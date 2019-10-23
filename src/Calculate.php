<?php

namespace ibet;
use ibet\Operators\Multiplication;
use ibet\Operators\Addition;
use ibet\Operators\Subtraction;
use ibet\Operators\Division;

class Calculate
{
	private $operands;

	function __construct()
	{
		$this->operands = [
		"*" => new Multiplication(),
		"+" => new Addition(),
		"-" => new Subtraction(),
		"/" => new Division()
			];
	}

	/*
	 * Uses the single use principle for each operand as a class.
	 */
	function determineOperandClass($operand)
	{
		return $this->operands[$operand];
	}

	/*
	* This accepts a class, right and left inputs
	* and returns an integer.
	*/
	function calculate($class,$right,$left) : int
	{
		return $class->run($right,$left);
	}
}