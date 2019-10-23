<?php

namespace ibet\Middleware;

class APIMiddleware
{
	//SHA256
	const APIKEY = "0516DE6BAA770595166E3E4B3258D96A73066C3BA4EB2717DA1B3CA43299B777";
	const OPERANDS = [
		"*",
		"+",
		"-",
		"/"
	];

	private $key;
	private $payload;

	public function __construct($key,$payload)
	{
		$this->key = $key;
		$this->payload = $payload;

	}

	/*
	 * Validates the CRSF SHA256 key as uppercase.
	 */
	public function validateKey() : bool
	{
		return strcmp(strtoupper($this->key),self::APIKEY) == 0;
	}

	/*
	 * Validates the operands and the input values by type.
	 */
	public function validateInputs() : bool
	{
		unset($this->payload->key);

			if(!in_array($this->payload->operand,self::OPERANDS)){
				return true;
			}
			elseif(!is_numeric($this->payload->leftInput) || !is_numeric($this->payload->rightInput))
			{
				return true;
			}
			return false;

	}
}