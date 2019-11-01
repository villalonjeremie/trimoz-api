<?php
use Trimoz\Model\CaseEntityCollection;
use Trimoz\Model\CaseEntityFactory;
use Trimoz\Permutation\Library\ToolBoxPermutation;
use Trimoz\Permutation\Library\ResponseApi;

global $caseEntityFactory;
global $toolBoxPermutation;
global $responseApi;

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

function getResponseApi() {
    //make this function as singleton
    if (empty($responseApi)) {
        return new ResponseApi;
    }
    return $responseApi;
}