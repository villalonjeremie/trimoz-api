<?php
use Trimoz\Controller\PermutationController;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$requestMethod = $_SERVER['REQUEST_METHOD'];
$responseApi = getResponseApi();

if(isset($_SERVER['QUERY_STRING'])) {
    $arrayQueryRequest = explode("&", $_SERVER['QUERY_STRING']);
} else {
    $responseApi->response(422, 'Query empty');
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $controller = new PermutationController(
        getCaseEntityCollection($arrayQueryRequest, getCaseEntityFactory()),
        getToolBoxPermutation(),
        getClientRedisConnection(),
        $responseApi
    );

    $controller->actionGet();
}

