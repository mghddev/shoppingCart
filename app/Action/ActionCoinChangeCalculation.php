<?php

namespace App\Action;

class ActionCoinChangeCalculation
{
    private array $combinationArray;

    public function __invoke(int $n, array $numbers): array
    {
        // array to store the combinations
        // It can contain max n elements
        $arr = array();
        $this->combinationArray = array();
        //find all combinations
        $this->findCombinationsUtil($arr, $numbers, 0, $n, $n);

        return $this->combinationArray;
    }

    private function findCombinationsUtil(array $arr, array $numbers, int $index, int $num, int $reducedNum): void
    {
        if ($reducedNum < 0) {
            return;
        }
        if ($reducedNum == 0) {
            $fullArr = [];
            for ($i = 0; $i < $index; $i++) {
                $fullArr[] = $arr[$i];
            }
            $this->combinationArray[] = $fullArr;

            return;
        }
        // Find the previous number stored in arr[] It helps in maintaining increasing order
        $prev = ($index == 0) ? 0 : array_search($arr[$index - 1], $numbers);
        // note loop starts from previous number i.e. at array location index - 1
        $k = $prev;
        while ($reducedNum > 0 && ($k < count($numbers))) {
            $k++;
            $arr[$index] = $numbers[$k - 1];
            // call recursively with reduced value
            $this->findCombinationsUtil(
                $arr,
                $numbers,
                $index + 1,
                $num,
                $reducedNum - $numbers[$k - 1]
            );
        }
    }
}
