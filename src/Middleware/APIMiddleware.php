<?php

namespace kfflnk\Middleware;

class APIMiddleware
{
	//SHA256
	const APIKEY = "4FD63680FC9E128279AE4EF26172A5DB88F538F3AEFCAD181D9C4BC3E0F67A69";
	const OPERANDS = [
		"U+1F47B",
		"U+1F47D",
		"U+1F480",
		"U+1F631"
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