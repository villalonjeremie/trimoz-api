<?php
namespace Trimoz\Model;

class CaseEntityCollection {
    private $tabCasesEntity;
    private $arrayCasesRequest;
    private $caseEntityFactory;

    public function __construct(array $arrayCasesRequest = [], CaseEntityFactory $caseEntityFactory)
    {
        $this->arrayCasesRequest = $arrayCasesRequest;
        $this->caseEntityFactory = $caseEntityFactory;
    }

    public function builderCollection()
    {
        foreach ($this->arrayCasesRequest as $case){
            $caseEntityFormatted = $this->caseEntityFactory->getCaseEntity($case)->format();
            $this->setCaseEntity($caseEntityFormatted);
        }
        //build Collection from array Cases state
    }

    public function getCount(){
        return count($this->tabCasesEntity);
    }

    public function getCaseEntity(int $index){
        if (isset($this->tabCaseEntity[$index])){
            return $this->tabCasesEntity[$index];
        }
    }

    public function getTabStates() {
        return $this->tabCasesEntity;
    }

    public function setCaseEntity(CaseEntity $caseEntity) {
        $this->tabCasesEntity[] = $caseEntity;
    }

    public function removeCaseEntity(int $index) {
        if (isset($this->tabCaseEntity[$index])) {
            unset($this->tabCasesEntity[$index]);
        }
    }
}