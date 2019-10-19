<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

final class CalculatorAPITest extends TestCase
{

	private $http;
	private $key;

	public function setUp()
	{
		$this->http = new Client(['base_uri' => 'http://localhost:8000/']);
		$this->key = "4FD63680FC9E128279AE4EF26172A5DB88F538F3AEFCAD181D9C4BC3E0F67A69";
	}

	public function tearDown() {
		$this->http = null;
		$this->key = null;
	}

	public function testPostAddition(): void
	{
		// create our http client (Guzzle)
		$client = $this->http;

		$data = array(
			"operand" => "U+1F47D",
			"rightInput" => "5",
			"leftInput" => "-2",
			"key" => $this->key
		);

		$response = $client->post('/router.php', ["body" => json_encode($data)]);


		$this->assertEquals(201, $response->getStatusCode());
		$data = json_decode($response->getBody()->getContents());
		$this->assertEquals(3, $data->{"message"});
	}

	public function testPostSubtraction(): void
	{
		// create our http client (Guzzle)
		$client = $this->http;

		$data = array(
			"operand" => "U+1F480",
			"rightInput" => "5",
			"leftInput" => "-2",
			"key" => $this->key
		);

		$response = $client->post('/router.php', ["body" => json_encode($data)]);


		$this->assertEquals(201, $response->getStatusCode());
		$data = json_decode($response->getBody()->getContents());
		$this->assertEquals(7, $data->{"message"});
	}

	public function testPostMultiplication(): void
	{
		// create our http client (Guzzle)
		$client = $this->http;

		$data = array(
			"operand" => "U+1F47B",
			"rightInput" => "5",
			"leftInput" => "6",
			"key" => $this->key
		);

		$response = $client->post('/router.php', ["body" => json_encode($data)]);


		$this->assertEquals(201, $response->getStatusCode());
		$data = json_decode($response->getBody()->getContents());
		$this->assertEquals(30, $data->{"message"});
	}

	public function testPostDivision(): void
	{
		// create our http client (Guzzle)
		$client = $this->http;

		$data = array(
			"operand" => "U+1F631",
			"rightInput" => "10",
			"leftInput" => "5",
			"key" => $this->key
		);

		$response = $client->post('/router.php', ["body" => json_encode($data)]);


		$this->assertEquals(201, $response->getStatusCode());
		$data = json_decode($response->getBody()->getContents());
		$this->assertEquals("2", $data->{"message"});
	}

}