<?php

namespace App\Http\Controllers\API;

use App\Action\Goods\ActionCalculateTotalPrice;
use App\Http\Requests\GoodsItemsRequest;
use App\Http\Resources\PriceResource;
use Exception;

class HttpApiCalculatePrice
{

    public function __construct(private ActionCalculateTotalPrice $actionCalculateTotalPrice)
    {
    }

    /**
     * @throws Exception
     */
    public function __invoke(GoodsItemsRequest $request): PriceResource
    {
        $price = $this->actionCalculateTotalPrice->__invoke($request->get('items'));

        return (new PriceResource($price));
    }
}
