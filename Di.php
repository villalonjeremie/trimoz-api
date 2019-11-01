<?php
use Trimoz\Model\CaseEntityCollection;
use Trimoz\Model\CaseEntityFactory;
use Trimoz\Permutation\ToolBoxPermutation;

global $caseEntityFactory;
global $toolBoxPermutation;

function getCaseEntityFactory() {
    //make this function as singleton
    if (empty($caseEntityFactory)) {
        return new CaseEntityFactory;
    }
    return $caseEntityFactory;
}

function getCaseEntityCollection($arrayQuery, $caseEntityFactory) {
     return new CaseEntityCollection($arrayQuery, $caseEntityFactory);
}

function getToolBoxPermutation() {
    //make this function as singleton
    if (empty($toolBoxPermutation)) {
        return new ToolBoxPermutation;
    }
    return $toolBoxPermutation;
}