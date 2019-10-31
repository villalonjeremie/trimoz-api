<?php
namespace Src\Controller;

class PermutationController {

    private $permutation;
    private $requestMethod;

    public function __construct($requestMethod, $states, $permutation)
    {
        $this->requestMethod = $requestMethod;
        $this->permutation = $permutation;
    }

    public function processRequest()
    {
        switch ($this->requestMethod) {
            case 'GET':
                $response = $this->getPermutations();
                break;
            default:
                $response = $this->notFoundResponse();
                break;
        }
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }
    }

    private function getPermutations()
    {
        $result = $this->permutation->getResults();
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        $response['body'] = json_encode($result);
        return $response;
    }

    private function notFoundResponse()
    {
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}