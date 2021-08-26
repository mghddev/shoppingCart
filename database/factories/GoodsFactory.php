<?php

namespace Database\Factories;

use App\DAL\Model\Goods;
use Illuminate\Database\Eloquent\Factories\Factory;

class GoodsFactory extends Factory
{
    protected $model = Goods::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->name,
            'unit_price' => $this->faker->numberBetween(10, 25)
        ];
    }
}
