<?php
namespace Trimoz\Model;

class CaseEntityCollection {
    private $tabCaseEntity;

    public function __construct(array $tabCaseEntity = [])
    {
        $this->tabCaseEntity = $tabCaseEntity;
    }

    public function checkValid(array $tabError = []){

    }

    public function getCount(){
        return count($this->tabCaseEntity);
    }

    public function getCaseEntity(int $index){
        if (isset($this->tabCaseEntity[$index])){
            return $this->tabCaseEntity[$index];
        }
    }

    public function getTabState() {
        return $this->tabCaseEntity;
    }

    public function setCaseEntity(CaseEntity $caseEntity) {
        $this->tabCaseEntity[] = $caseEntity;
    }

    public function removeCaseEntity(int $index) {
        if (isset($this->tabCaseEntity[$index])) {
            unset($this->tabCaseEntity[$index]);
        }
    }
}