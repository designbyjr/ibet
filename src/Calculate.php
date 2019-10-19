<?php

namespace kfflnk;
use kfflnk\Operators\Multiplication;
use kfflnk\Operators\Addition;
use kfflnk\Operators\Subtraction;
use kfflnk\Operators\Division;

class Calculate
{
	private $operands;

	function __construct()
	{
		$this->operands = [
		"U+1F47B" => new Multiplication(),
		"U+1F47D" => new Addition(),
		"U+1F480" => new Subtraction(),
		"U+1F631" => new Division()
			];
	}

	function determineOperandClass($operand)
	{
		return $this->operands[$operand];
	}

	function calculate($class,$right,$left) : int
	{
		return $class->run($right,$left);
	}
}