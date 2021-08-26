<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request $request
     * @return array
     */
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
