<?php

namespace Database\Seeders;

use App\DAL\Model\Goods;
use App\DAL\Model\Rule;
use Illuminate\Database\Seeder;

class GoodsAndRulesTableSeeder extends Seeder
{
    const TITLES = ['A', 'B', 'C', 'D', 'E', 'F', 'G'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i <= 6; $i++) {
            $unitPrice = rand(5, 20);
            $goodsItem = Goods::query()->create([
                'title' => self::TITLES[$i],
                'unitPrice' => $unitPrice
            ]);

            if (rand(0, 1)) {
                $rules = [];
                for ($j = 1; $j < rand(2, 4); $j++) {
                    $quantity = (2 * $j) + $i;
                    $rules[] = [
                        'goodsId' => $goodsItem->id,
                        'quantity' => $quantity,
                        'specialPrice' => ($quantity * $unitPrice) - ($quantity * $j),
                        'isActive' => rand(0, 1),
                        'createdAt' => new \DateTime(),
                        'updateAt' => new \DateTime()
                    ];
                }

                Rule::query()->insert($rules);
            }
        }
    }
}
