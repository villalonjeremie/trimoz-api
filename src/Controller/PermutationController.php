<?php
namespace Trimoz\Controller;

use Trimoz\Model\CaseEntityCollection;
use Trimoz\Permutation\ToolBoxPermutation;

class PermutationController {
    private $caseEntityCollection;
    private $toolBoxPermutation;

    public function __construct(CaseEntityCollection $caseEntityCollection, ToolBoxPermutation $toolBoxPermutation)
    {
        $this->caseEntityCollection = $caseEntityCollection;
        $this->toolBoxPermutation = $toolBoxPermutation;
    }

    public function actionGet()
    {
        $arrayCases = $this->toolBoxPermutation->getPermutations($this->caseEntityCollection->getTabStates());
        $response['body'] = json_encode($arrayCases);
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