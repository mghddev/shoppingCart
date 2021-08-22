<?php
namespace App\Http\Validation;

use Illuminate\Validation\Factory;
use Illuminate\Validation\ValidationException;

/**
 * Class ShoppingValidation
 * @package App\Http\Validation
 */
class ShoppingValidation
{
    private Factory $validator;

    /**
     * ShoppingValidation constructor.
     * @param Factory $validator
     */
    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param array $data
     * @throws ValidationException
     */
    public function calculateTotalPrice(array $data)
    {
        $this->validator->validate($data, [
           'items' => 'required|string'
        ]);
    }
}
