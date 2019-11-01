<?php
namespace Trimoz\Model;

use Trimoz\Model\CaseEntity;

class CaseEntityFactory {

    public static function getCaseEntity(string $state) {
        return new CaseEntity($state);
    }
}