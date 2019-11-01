<?php
namespace Trimoz\Controller;

class PermutationController {

    private $caseEntityCollection;

    public function __construct(CaseEntityCollection $caseEntityCollection)
    {
        $this->caseEntityCollection = $caseEntityCollection;
    }

    public function actionGet()
    {
        $result = $this->permutation->getResults();
        $response['body'] = json_encode($result);
        $this->setHeader('HTTP/1.1 200 OK');
        if ($response['body']) {
            echo $response['body'];
        }
    }

    public function notFoundResponse()
    {
        $this->setHeader('HTTP/1.1 404 Not Found');
        exit;
    }

    private function setHeader(string $message) {
        header($message);
    }
}