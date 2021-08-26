<?php

namespace App\DAL\Repository;

use App\DAL\Entity\GoodsEntity;

interface GoodsRepositoryInterface
{
    public function getGoodsById(int $id, int $neededQuantity = 1): GoodsEntity;
}
