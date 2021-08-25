<?php
namespace App\Http\Controllers\API;


use App\Action\Goods\ActionCalculateTotalPrice;
use App\Http\Requests\GoodsItemsRequest;
use App\Http\Resources\PriceResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class HttpApiCalculatePrice
{

    private ActionCalculateTotalPrice $actionCalculateTotalPrice;

    public function __construct(ActionCalculateTotalPrice $actionCalculateTotalPrice)
    {
        $this->actionCalculateTotalPrice = $actionCalculateTotalPrice;
    }

    /**
     * @throws ValidationException
     * @throws Exception
     */
    public function __invoke(GoodsItemsRequest $request): JsonResponse
    {
        $price = $this->actionCalculateTotalPrice->__invoke($request->get('items'));

        return (new PriceResource($price))->response();
    }
}
