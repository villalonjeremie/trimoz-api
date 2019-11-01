<?php
namespace Trimoz\Model;

class CaseEntity {

    private $state;

    public function __construct(string $state)
    {
        $this->state = $state;
    }

    public function checkValid(string $attrKey = null, array $tabError = [])
    {
        return true;
    }

    public function getState()
    {
        return $this->state;
    }


    public function setState($state)
    {
        $this->state = $state;
    }

    //parse uri;
foreach (explode("&", $_SERVER['QUERY_STRING']) as $tmp_arr_param) {
$split_param = explode("=", $tmp_arr_param);
if (strpos( $split_param[0] , 'states[') !== false &&
in_array($split_param[1],['.','x','o']))
$args[(int)substr($split_param[0], -2,-1)]= $split_param[1];
}
}