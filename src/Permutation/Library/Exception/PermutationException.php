<?php
namespace Trimoz\Permutation\Library\Exception;

use Trimoz\Permutation\Library\ResponseApi;

class PermutationException extends \Exception
{
    private $responseApi;
    private $message;

    public function __construct(ResponseApi $responseApi, $message)
    {
        $this->responseApi = $responseApi;
        $this->message = $message;
    }

    public function responseError() {
        $this->responseApi->response(400, $this->message);
    }
}