<?php
namespace App\DAL\Repository;

use App\DAL\Entity\GoodsEntity;

/**
 * Interface GoodsRepositoryInterface
 * @package App\DAL\Repository
 */
interface GoodsRepositoryInterface
{
    public function getGoodsById(int $id, int $neededQuantity = 1): GoodsEntity;
}
