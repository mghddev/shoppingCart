<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class PriceResource
 * @method getName: string
 * @method getQuantity: int
 * @method getPrice: float
 * @method getPurchaseProfit: float
 * @package App\Http\Resources
 */
class PriceResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'title' => $this->getName(),
            'quantity' => $this->getQuantity(),
            'price' => $this->getPrice(),
            'purchaseBenefit' => $this->getPurchaseProfit()
        ];
    }
}
