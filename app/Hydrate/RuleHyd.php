<?php

namespace App\Hydrate;

use App\DAL\Entity\RuleEntity;
use DateTime;
use Exception;

/**
 * Class RuleHyd
 *
 * @package App\Hydrate
 */
class RuleHyd
{
    protected RuleEntity $entity;

    /**
     * @throws Exception
     */
    private function arrayToEntity(array $data): RuleEntity
    {
        $entity = new RuleEntity();

        if (isset($data['id'])) {
            $entity->setId($data['id']);
        }

        if (isset($data['goods_id'])) {
            $entity->setGoodsId($data['goods_id']);
        }

        if (isset($data['quantity'])) {
            $entity->setQuantity($data['quantity']);
        }

        if (isset($data['special_price'])) {
            $entity->setSpecialPrice($data['special_price']);
        }

        if (isset($data['is_active'])) {
            $entity->setIsActive($data['is_active']);
        }

        if (isset($data['goodsEntity']) && !empty($data['goodsEntity'])) {
            $entity->setGoodsEntity($data['goodsEntity']);
        }

        if (isset($data['created_at'])) {
            $entity->setCreatedAt(!empty($data['created_at']) ? new DateTime($data['created_at']) : null);
        }

        return $entity;
    }

    /**
     * @throws Exception
     */
    public function arrayOfArrayToArrayOfEntities(array $rules): array
    {
        $res = [];

        foreach ($rules as $item) {
            $res[] = $this->arrayToEntity($item);
        }

        return $res;
    }
}
