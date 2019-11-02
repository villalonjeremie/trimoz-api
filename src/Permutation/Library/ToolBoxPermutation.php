<?php
namespace Trimoz\Permutation\Library;

use Predis\Profile\Factory;

class ToolBoxPermutation {

    public function getPermutations(array $arrayCases) {
        $count = count($arrayCases);
        $p1 = [];
        $p2 = [];

        for($i = 0; $i<$count; $i++) {

            if ($i == 0) {
                if ($arrayCases[$i] == ".") {
                    array_push($p1, ["x"]);
                    array_push($p1, ["."]);
                } elseif($arrayCases[$i] == "x") {
                    array_push($p1, ["x"]);
                } else{
                    array_push($p1, ["."]);
                }
                continue;
            }

            while(!empty($p1)) {

                switch ($arrayCases[$i]) {
                    case "x":


                    case "o":

                    case ".":

                }
            }

        }



        return $p1;
    }

}