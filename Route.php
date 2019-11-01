<?php
use Trimoz\Controller\PermutationController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$requestMethod = $_SERVER['REQUEST_METHOD'];
$queryRequest = explode("&", $_SERVER['QUERY_STRING']);

if (empty($queryRequest)) {
    header("HTTP/1.1 422 Unprocessable Entity");
    exit();
}


//die(getCaseEntityFactory());

$controller = new PermutationController(getCaseEntityCollection($queryRequest));
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $controller->actionGet();
} else {
    $controller->notFoundResponse();
}

