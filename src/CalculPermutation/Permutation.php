<?php
namespace Src\CalculPermutation;

class Permutation {

    private $states;

    public function __construct(array $states)
    {
        $this->states = $states;
    }

    public function getResults()
    {
        $results = $this->states;

        // Algo TODO


        return $results;
    }
}