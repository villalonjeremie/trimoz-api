<?php
namespace Trimoz\Permutation\Library\Exception;

class RedisException extends \Exception {

    public function addToResponse($message) {
        echo 'Warning :'.$message;
        echo "\n";
    }

}