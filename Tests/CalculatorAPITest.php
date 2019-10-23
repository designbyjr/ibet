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
		$this->key = "0516DE6BAA770595166E3E4B3258D96A73066C3BA4EB2717DA1B3CA43299B777";
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
			"operand" => "+",
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
			"operand" => "-",
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
			"operand" => "*",
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
			"operand" => "/",
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