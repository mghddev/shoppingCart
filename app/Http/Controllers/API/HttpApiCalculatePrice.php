<?php
namespace App\Http\Controllers\API;


use App\Action\Goods\ActionCalculateTotalPrice;
use App\Http\Resources\PriceResource;
use App\Http\Validation\ShoppingValidation;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class HttpApiCalculatePrice
{
    private ShoppingValidation $validation;
    private ActionCalculateTotalPrice $actionCalculateTotalPrice;

    /**
     * HttpApiCalculatePrice constructor.
     * @param ShoppingValidation $validation
     * @param ActionCalculateTotalPrice $actionCalculateTotalPrice
     */
    public function __construct(ShoppingValidation $validation, ActionCalculateTotalPrice $actionCalculateTotalPrice)
    {
        $this->validation = $validation;
        $this->actionCalculateTotalPrice = $actionCalculateTotalPrice;
    }

    /**
     * @return JsonResponse
     * @throws ValidationException
     * @throws Exception
     */
    public function __invoke(): JsonResponse
    {
        $data = request()->all();
        $this->validation->calculateTotalPrice($data);
        $price = $this->actionCalculateTotalPrice->__invoke($data['items']);
        return (new PriceResource($price))->response();
    }
}
