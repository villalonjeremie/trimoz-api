<?php
namespace Trimoz\Controller;

use Trimoz\Model\CaseEntityCollection;
use Trimoz\Permutation\Library\ToolBoxPermutation;
use Trimoz\Permutation\Library\ResponseApi;
use Trimoz\Permutation\Redis\ClientConnection;

class PermutationController {
    private $caseEntityCollection;
    private $toolBoxPermutation;
    private $responseApi;
    private $redisClientConnection;

    public function __construct(CaseEntityCollection $caseEntityCollection, ToolBoxPermutation $toolBoxPermutation, ClientConnection $redisClientConnection, ResponseApi $responseApi)
    {
        $this->caseEntityCollection = $caseEntityCollection;
        $this->toolBoxPermutation = $toolBoxPermutation;
        $this->responseApi = $responseApi;
        $this->redisClientConnection = $redisClientConnection;
    }

    public function actionGet()
    {
        $this->caseEntityCollection->builderCollection();

        if ($this->caseEntityCollection->getCountError() > 0) {
            $this->responseApi->response(404, $this->caseEntityCollection->getErrors());
        }
        $arrayCases = $this->toolBoxPermutation->getPermutations($this->caseEntityCollection->getTabStates(), $this->redisClientConnection);
        $this->responseApi->response(200, $arrayCases);
    }
}