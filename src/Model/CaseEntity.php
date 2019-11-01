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

        return $this;
    }

    private function checkValid($splitParam){
        if (!preg_match('/[\.xo]/', $splitParam[1]) || !preg_match('/states\[\d\]/', $splitParam[0])) {
            $this->setErrorInit();
            $this->setErrorMessage("Invalid request value : must be \"o\" or \".\" or \"x\"");
            $this->setErrorMessage("Invalid request : must be states['integer']");
            return false;
        }

        return true;
    }

    private function setErrorInit() {
        $error = [
            "object" => get_class($this),
            "message" => [],
        ];
        $this->error = $error;
    }

    private function setErrorMessage($message) {
        $this->error["message"][] = $message;
    }

    public function getError() {
        return $this->error;
    }
}