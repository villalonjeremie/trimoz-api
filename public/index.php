<?php
require "../bootstrap.php";
use Src\Controller\PermutationController;
use Src\CalculPermutation\Permutation;

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$args =[];

//parse uri;
foreach (explode("&", $_SERVER['QUERY_STRING']) as $tmp_arr_param) {
    $split_param = explode("=", $tmp_arr_param);
    if (strpos( $split_param[0] , 'states[') !== false &&
        in_array($split_param[1],['.','x','o']))
        $args[(int)substr($split_param[0], -2,-1)]= $split_param[1];
}

$requestMethod = $_SERVER['REQUEST_METHOD'];

if (empty($args)) {
    header("HTTP/1.1 422 Unprocessable Entity");
    exit();
}

$permutation = new Permutation($args);
$controller = new PermutationController($requestMethod, $args, $permutation);
$controller->processRequest();