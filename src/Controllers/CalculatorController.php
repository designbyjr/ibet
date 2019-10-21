<?php
namespace Kfflnk\Controllers;
/*
 * This is the controller class that receives API end point calls
 */
use kfflnk\Calculate;

Final class CalculatorController
{
	public $operand;
	public $leftInput;
	public $rightInput;
	private $calculateClass;

	function __construct($operand,$leftInput,$rightInput)
	{
		$this->operand = $operand;
		$this->leftInput = $leftInput;
		$this->rightInput = $rightInput;
		$this->calculateClass = new Calculate();
	}

	/*
	 * Uses the calculator class to determine operands class and return
	 * an numeric value using calculate function.
	 * */
	function calculateThis()
	{
		$class = $this->calculateClass->determineOperandClass($this->operand);
		return $this->calculateClass->calculate($class,$this->leftInput,$this->rightInput);
	}


}