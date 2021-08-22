<?php
namespace App\DAL\Repository;

use App\DAL\Entity\GoodsEntity;
use App\DAL\Model\Goods;
use App\Exceptions\ExceptionGoodsNotFound;
use App\Hydrate\GoodsHyd;
use Exception;

/**
 * Class GoodsRepository
 * @package App\DAL\Repository
 */
class GoodsMysqlRepository implements GoodsRepositoryInterface
{

    private Goods $model;
    private GoodsHyd $goodsHyd;

    /**
     * GoodsRepository constructor.
     * @param Goods $model
     * @param GoodsHyd $goodsHyd
     */
    public function __construct(Goods $model, GoodsHyd $goodsHyd)
    {
        $this->model = $model;
        $this->goodsHyd = $goodsHyd;
    }


    /**
     * @throws Exception
     */
    public function getGoodsById(int $id, int $neededQuantity = 1): GoodsEntity
    {
        $goodsItem = $this->model->newQuery()
            ->with(['rules' => function ($query) use ($neededQuantity) {
                $query->where('isActive', '=', true)
                    ->where('quantity', '<', $neededQuantity);
            }])->find($id);
        if (empty($goodsItem)) {
            throw new ExceptionGoodsNotFound(sprintf('There is no item with id %s', $id));
        }

        return $this->goodsHyd->fromArray($goodsItem->toArray())->toEntity();
    }
}
