<?php


namespace ibet\Operators;

final class Addition
{
	function run($right,$left) : int
	{
		return  $left + $right;
	}
}