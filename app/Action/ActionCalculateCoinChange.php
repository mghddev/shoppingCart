<?php
namespace App\Action;


/**
 * Trait ActionCalculateCoinChange
 * @package App\Action
 */
class ActionCalculateCoinChange
{
    private array $combinationArray;

    /**
     * ActionCalculateCoinChangeTrait constructor.
     */
    public function __construct()
    {
        $this->combinationArray = [];
    }

    /**
     * @param int $n
     * @param array $numbers
     * @return array
     */
    public function __invoke(int $n, array $numbers): array
    {
        // array to store the combinations
        // It can contain max n elements
        $arr = array();

        //find all combinations
        $this->findCombinationsUtil($arr, $numbers,0, $n, $n);

        return $this->combinationArray;
    }

    /**
     * @param array $arr
     * @param array $numbers
     * @param int $index
     * @param int $num
     * @param int $reducedNum
     */
    private function findCombinationsUtil(array $arr, array $numbers, int $index, int $num, int $reducedNum)
    {
        // Base condition
        if ($reducedNum < 0) {
            return;
        }

        if ($reducedNum == 0)
        {
            $fullArr = [];
            for ($i = 0; $i < $index; $i++) {
                $fullArr[] = $arr[$i];
            }
            $this->combinationArray[] = $fullArr;
            return;
        }

        // Find the previous number
        // stored in arr[] It helps
        // in maintaining increasing order
        $prev = ($index == 0) ? 0 : array_search($arr[$index - 1], $numbers);
        // note loop starts from previous
        // number i.e. at array location
        // index - 1
        $k = $prev;
        while ($reducedNum > 0 && ($k < count($numbers))) {
            $k++;
            // next element of array is k
            $arr[$index] = $numbers[$k-1];

            // call recursively with
            // reduced number
            $this->findCombinationsUtil($arr, $numbers, $index + 1, $num, $reducedNum - $numbers[$k-1]);
        }

    }
}
