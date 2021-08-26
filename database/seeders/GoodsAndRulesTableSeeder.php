<?php

namespace Database\Seeders;

use App\DAL\Model\Goods;
use App\DAL\Model\Rule;
use DateTime;
use Illuminate\Database\Seeder;

class GoodsAndRulesTableSeeder extends Seeder
{
    const TITLES = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];

    /**
     * Run the database seeds.
     */
    public function run()
    {
        for ($i = 0; $i <= 6; $i++) {
            $unitPrice = rand(5, 20);
            $goodsItem = Goods::query()->create(
                [
                'title' => self::TITLES[$i],
                'unit_price' => $unitPrice,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
                ]
            );

            if (rand(0, 1)) {
                $rules = [];
                for ($j = 1; $j < rand(2, 4); $j++) {
                    $quantity = (2 * $j) + $i;
                    $rules[] = [
                        'goods_id' => $goodsItem->id,
                        'quantity' => $quantity,
                        'special_price' => ($quantity * $unitPrice) - ($quantity * $j),
                        'is_active' => rand(0, 1),
                        'created_at' => new DateTime(),
                        'updated_at' => new DateTime()
                    ];
                }

                Rule::query()->insert($rules);
            }
        }
    }
}
