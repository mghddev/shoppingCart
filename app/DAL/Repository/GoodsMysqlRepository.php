<?php
namespace App\DAL\Repository;

use App\DAL\Entity\GoodsEntity;
use App\DAL\Model\Goods;

/**
 * Class GoodsRepository
 * @package App\DAL\Repository
 */
class GoodsMysqlRepository implements GoodsRepositoryInterface
{
    /**
     * @var Goods
     */
    private Goods $model;

    /**
     * GoodsRepository constructor.
     * @param Goods $model
     */
    public function __construct(Goods $model)
    {
        $this->model = $model;
    }


    public function getGoodsById(int $id, int $neededQuantity = 1): GoodsEntity
    {
        $goodsQuery = $this->model->newQuery()
            ->with(['rules' => function ($query) use ($neededQuantity) {
                $query->where('isActive', '=', true)
                    ->where('quantity', '<', $neededQuantity);
            }])->findOrFail($id);

        dd($goodsQuery);

    }
}
