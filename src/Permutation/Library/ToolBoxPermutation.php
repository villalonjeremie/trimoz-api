<?php
namespace Trimoz\Permutation\Library;

use Trimoz\Permutation\Redis\ClientConnection;

class ToolBoxPermutation {

    public function getPermutations(array $arrayCases, ClientConnection $redisClientConnection)
    {

        $redis = $redisClientConnection->getConnection();
        $key = json_encode($arrayCases);

        if ($redis->exists($key)) {
            return json_decode($redis->get($key));
        } else {
            $resultPermutation = $this->algoPermutation($arrayCases);
            $redis->set($key, json_encode($resultPermutation));
            return $resultPermutation;
        }
    }

    private function algoPermutation($arrayCases) {

        $count = count($arrayCases);
        $stack1 = [];
        $stack2 = [];

        for($i = 0; $i<$count; $i++) {
            //if stack1 is empty
            if ($i == 0 && empty($stack1)) {
                if ($arrayCases[$i] == "x") {
                    array_push($stack1, ["x"]);
                } elseif ($arrayCases[$i] == "o") {
                    array_push($stack1, ["o"]);
                } else {
                    array_push($stack1, ["x"]);
                    array_push($stack1, ["o"]);
                }
                continue;
            }

            //pop stack2 with new element depend on the state
            while(!empty($stack1)) {
                $array = [];
                switch ($arrayCases[$i]) {
                    case "x":
                        $array = array_pop($stack1);
                        $array[] = "x";
                        array_push($stack2, $array);
                        break;

                    case "o":
                        $array = array_pop($stack1);
                        $array[] = "o";
                        array_push($stack2, $array);
                        break;

                    default:
                        $array = array_pop($stack1);
                        $array[] = "x";
                        array_push($stack2, $array);
                        array_pop($array);
                        $array[] = "o";
                        array_push($stack2, $array);
                        break;
                }
            }

            //copy reference stack 2 to stack1
            $stack1 = $stack2;
            //init stack2
            $stack2 = [];
        }

        return $stack1;
    }

}