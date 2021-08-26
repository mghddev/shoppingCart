<?php

namespace App\DAL\Repository;

use App\DAL\Entity\GoodsEntity;
use App\DAL\Model\Goods;
use App\Exceptions\ExceptionGoodsNotFound;
use App\Hydrate\GoodsHyd;
use Exception;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GoodsMysqlRepository implements GoodsRepositoryInterface
{
    public function __construct(private Goods $model, private GoodsHyd $goodsHyd)
    {
    }

    /**
     * @throws Exception
     */
    public function getGoodsById(int $id, int $neededQuantity = 1): GoodsEntity
    {
        $goodsItem = $this->model->newQuery()
            ->with(
                ['rules' => function (HasMany $query) use ($neededQuantity): void {
                    $query->where('is_active', '=', true)
                        ->where('quantity', '<', $neededQuantity);
                }]
            )->find($id);
        if (empty($goodsItem)) {
            throw new ExceptionGoodsNotFound(sprintf('There is no item with id %s', $id));
        }

        return $this->goodsHyd->fromArray($goodsItem->toArray())->toEntity();
    }
}
