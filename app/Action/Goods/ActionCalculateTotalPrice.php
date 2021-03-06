<?php

namespace App\Action\Goods;

use App\DAL\DTO\PriceDTO;
use Exception;

class ActionCalculateTotalPrice
{
    public function __construct(
        private ActionCalculateTotalPriceOfOneGoodsItem $actionCalculateTotalPriceOfOneGoodsItem
    ) {
    }

    /**
     * @throws Exception
     */
    public function __invoke(string $items): PriceDTO
    {
        $itemsArray = $this->getNumberOfItemsArray($items);
        $minPrices = [];
        $totalPrice = 0;
        $totalProfit = 0;
        $numberOfItems = 0;

        foreach ($itemsArray as $key => $number) {
            $minPrices[$key] = ($this->actionCalculateTotalPriceOfOneGoodsItem)((int) $key, $number);
            $numberOfItems += $number;
            $totalPrice += $minPrices[$key]->getPrice();
            $totalProfit += $minPrices[$key]->getPurchaseProfit();
        }

        return (new PriceDTO())
            ->setName('Total price')
            ->setQuantity($numberOfItems)
            ->setPrice($totalPrice)
            ->setPurchaseProfit($totalProfit);
    }

    /**
     * This method converts string of items to array of number of every goods item
     * i.e. $items = 1,1,2,5,5,5,4,2 => return [1 => 2, 2 => 2, 4 => 1, 5 => 3]
     */
    private function getNumberOfItemsArray(string $items): array
    {
        $dataArray = explode(',', $items);
        $totalItems = [];
        foreach ($dataArray as $item) {
            if (array_key_exists($item, $totalItems)) {
                $totalItems[$item] = $totalItems[$item] + 1;
            } else {
                $totalItems[$item] = 1;
            }
        }

        return $totalItems;
    }
}
