<?php
/*
 * This file receives requests and checks if the key is valid upon submit
 * If the key passes execute the controller.
 * */
header('Content-Type: application/json');
require_once __DIR__ ."/vendor/autoload.php";
use kfflnk\Controllers\CalculatorController as Controller;
use kfflnk\Middleware\APIMiddleware;
$json = file_get_contents('php://input');
$data = json_decode($json);

/*
 * get the inputs, then create new middleware and then validate
 */

$key = isset($data->key) ? $data->key : null;


//$key = isset($data['key']) ? $data['key'] : null;
//$operand = isset($data['operand']) ? $data['operand'] : null;
//$leftInput = isset($data['leftInput']) ? $data['leftInput'] : null;
//$rightInput = isset($data['rightInput']) ? $data['rightInput'] : null;


$middleware = new APIMiddleware($key,$data);

if(!$middleware->validateKey())
{
	header("HTTP/1.1 401 Unauthorized");
	echo json_encode(["status"=>401,"message" => "Your Request is Unauthorized"]);
	exit;
}
elseif ($middleware->validateInputs()){

	header("HTTP/1.1 400 Bad Request");
	echo json_encode(["status"=>400,"message" => "Your Request is Malformed"]);
	exit;
}

/*
 * Once the key and form data is valid submit to the controller the information.
 *
 */
$operand = isset($data->operand) ? $data->operand : null;
$leftInput = isset($data->leftInput) ? $data->leftInput : null;
$rightInput = isset($data->rightInput) ? $data->rightInput : null;

$controller = new Controller($operand,$leftInput,$rightInput);

header("HTTP/1.1 201 Created");

$value = $controller->calculateThis();
echo json_encode(["status"=>201,"message" => $value]);
exit;