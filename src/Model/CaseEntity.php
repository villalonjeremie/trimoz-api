<?php
namespace Trimoz\Model;

class CaseEntity {

    private $state;
    private $caseString;
    private $error;

    public function __construct(string $caseString)
    {
        $this->caseString = $caseString;
    }


    public function getState()
    {
        return $this->state;
    }


    public function setState(string $state)
    {
        $this->state = $state;
    }

    public function format(){
        $splitParam = explode("=", $this->caseString);

        if($this->checkValid($splitParam)) {
            $this->setState($splitParam[1]);
        }
    }

    private function checkValid($splitParam){
        if (preg_match('/states\[\d\]/', $splitParam[0])) {
            $this->setError("Invalid request : must be states['integer']");
            return false;
        } elseif(preg_match('\"[\.xo]\"', $splitParam[1])) {
            $this->setError("Invalid request value : must be \"o\" or \".\" or \"x\"");
            return false;
        }
        return true;
    }

    private function setError(string $message) {
        $this->error['message'] = $message;
        $this->error['object'] = get_class($this);
    }
}