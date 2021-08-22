<?php

namespace App\Action\Goods;


use App\Action\ActionCalculateCoinChange;
use App\DAL\DTO\PriceDTO;
use App\DAL\Repository\GoodsMysqlRepository;
use Exception;

/**
 * Class ActionCalculateTotalPriceOfOneGoodsItem
 * @package App\Action\Goods
 */
class ActionCalculateTotalPriceOfOneGoodsItem
{
    private GoodsMysqlRepository $goodsMysqlRepository;
    private ActionCalculateCoinChange $actionCalculateCoinChange;

    /**
     * ActionCalculateTotalPriceOfOneGoodsItem constructor.
     * @param GoodsMysqlRepository $goodsMysqlRepository
     * @param ActionCalculateCoinChange $actionCalculateCoinChange
     */
    public function __construct(
        GoodsMysqlRepository $goodsMysqlRepository,
        ActionCalculateCoinChange $actionCalculateCoinChange
    )
    {
        $this->goodsMysqlRepository = $goodsMysqlRepository;
        $this->actionCalculateCoinChange = $actionCalculateCoinChange;
    }

    /**
     * @param int $id
     * @param int $number
     * @return PriceDTO
     * @throws Exception
     */
    public function __invoke(int $id, int $number = 1): PriceDTO
    {
        $entity = $this->goodsMysqlRepository->getGoodsById($id, $number);
        $rules = $entity->getRules();
        if (!empty($rules)) {
            $numbers = [1];
            $specialPrices = [];
            $specialPrices[1] = $entity->getUnitPrice();
            foreach ($rules as $rule) {
                $numbers[] = $rule->getQuantity();
                $specialPrices[$rule->getQuantity()] = $rule->getSpecialPrice();
            }

            $states = $this->actionCalculateCoinChange->__invoke($number, $numbers);
            $totalPrices = $this->calculateTotalPriceForDifferentStates($states, $specialPrices);
            sort($totalPrices);
        } else {
            $totalPrices = array($number * $entity->getUnitPrice());
        }

        return (new PriceDTO())
            ->setQuantity($number)
            ->setName($entity->getTitle())
            ->setPrice($totalPrices[0])
            ->setPurchaseProfit(end($totalPrices) - $totalPrices[0]);
    }

    /**
     * This method calculates total price of every states according to special perice in every rule
     *  (i.e. number of item = 9 $states[2] = [1,3,5]
     *   => totalPrices[2] = unitPrice + specialPrice of rule3 + specialPrice of rule5)
     *
     * @param array $states
     * @param array $specialPrices
     * @return array
     */
    private function calculateTotalPriceForDifferentStates(array $states, array $specialPrices): array
    {
        $totalPrices = [];

        foreach ($states as $state) {
            $statePrice = 0;
            foreach ($state as $item) {
                $statePrice += $specialPrices[$item];
            }
            $totalPrices[] = $statePrice;
        }
        return $totalPrices;
    }
}
