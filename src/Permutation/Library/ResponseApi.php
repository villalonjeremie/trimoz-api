<?php
namespace Trimoz\Permutation\Library;

class ResponseApi
{
    public function response(int $code = null, $message = null) {

        if(preg_match('/[12]\d{2}/', $code)) {
            header('HTTP/1.1 200 OK');
            echo json_encode($message);
        } elseif(preg_match('/[4]\d{2}/', $code)) {
            header('HTTP/1.1 400 Bad Request');
            echo json_encode($message);
        } elseif(preg_match('/[5]\d{2}/', $code)) {
            header('HTTP/1.1 500 Error Server');
            echo json_encode($message);
        }
        exit;
    }
}
