<?php
namespace App\Hydrate;

use App\DAL\Entity\RuleEntity;
use DateTime;
use Exception;

/**
 * Class RuleHyd
 * @package App\Hydrate
 */
class RuleHyd
{

    /**
     * @var RuleEntity
     */
    protected RuleEntity $entity;

    /**
     * @param array $data
     * @return RuleEntity
     * @throws Exception
     * @throws Exception
     */
    private function arrayToEntity(array $data): RuleEntity
    {
        $entity = new RuleEntity ();

        if (isset($data['id'])) {
            $entity->setId($data['id']);
        }

        if (isset($data['goodsId'])) {
            $entity->setGoodsId($data['goodsId']);
        }

        if (isset($data['quantity'])) {
            $entity->setQuantity($data['quantity']);
        }

        if (isset($data['specialPrice'])) {
            $entity->setSpecialPrice($data['specialPrice']);
        }

        if (isset($data['isActive'])) {
            $entity->setIsActive($data['isActive']);
        }

        if (isset($data['goodsEntity']) && !empty($data['goodsEntity'])) {
            $entity->setGoodsEntity($data['goodsEntity']);
        }

        if (isset($data['createdAt'])) {
            $entity->setCreatedAt(!empty($data['createdAt']) ? new DateTime($data['createdAt']) : null);
        }

        return $entity;
    }

    /**
     * @param array $rules
     * @return array
     * @throws Exception
     */
    function arrayOfArrayToArrayOfEntities(array $rules): array
    {
        $res = [];

        foreach ($rules as $item) {
            $res[] = $this->arrayToEntity($item);
        }

        return $res;
    }
}
