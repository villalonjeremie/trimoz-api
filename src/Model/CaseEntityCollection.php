<?php
namespace Trimoz\Model;

class CaseEntityCollection {
    private $tabCasesEntity;
    private $arrayCasesRequest;
    private $caseEntityFactory;
    private $arrayError;

    public function __construct(array $arrayCasesRequest = [], CaseEntityFactory $caseEntityFactory)
    {
        $this->arrayCasesRequest = $arrayCasesRequest;
        $this->caseEntityFactory = $caseEntityFactory;
    }

    public function builderCollection()
    {
        foreach ($this->arrayCasesRequest as $case){
            $caseEntityFormatted = $this->caseEntityFactory->getCaseEntity($case)->format();
            if (!empty($caseEntityFormatted->getError())) {
                $this->arrayError[] = $caseEntityFormatted->getError();
            }
            $this->setCaseEntity($caseEntityFormatted);
        }
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

        $this->tabCasesEntity[] = $caseEntity->getState();
    }

    public function removeCaseEntity(int $index) {
        if (isset($this->tabCaseEntity[$index])) {
            unset($this->tabCasesEntity[$index]);
        }
    }

    public function getCountError() {
        if (empty($this->arrayError)) {
            return 0;
        }
        return count($this->arrayError);
    }

    public function getErrors() {
        return $this->arrayError;
    }
}