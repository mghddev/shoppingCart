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
     * @return $this
     */
    function fromArray(array $data) : RuleHyd
    {
        $this->entity = $this->arrayToEntity($data);

        return $this;
    }

    /**
     * @param RuleEntity $entity
     * @return $this
     */
    function fromEntity(RuleEntity $entity): RuleHyd
    {
        $this->entity = $entity;
        return $this;
    }

    /**
     * @return mixed
     */
    function toArray(): array
    {
        return $this->entityToArray($this->entity);
    }

    /**
     * @return RuleEntity
     */
    function toEntity(): RuleEntity
    {
        return $this->entity;
    }

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
     * @param RuleEntity $entity
     * @return array
     */
    private function entityToArray(RuleEntity $entity): array
    {
        $arr = [];

        if(!empty($entity->getId())) {
            $arr['id'] = $entity->getId();
        }

        if(!empty($entity->getGoodsId())) {
            $arr['goodsId'] = $entity->getGoodsId();
        }

        if(!empty($entity->getGoodsEntity())) {
            $arr['goodsEntity'] = $entity->getGoodsEntity();
        }

        if(!empty($entity->getQuantity())) {
            $arr['quantity'] = $entity->getQuantity();
        }

        if(!empty($entity->getSpecialPrice())) {
            $arr['specialPrice'] = $entity->getSpecialPrice();
        }

        if(!empty($entity->getIsActive())) {
            $arr['isActive'] = $entity->getIsActive();
        }

        if(!empty($entity->getCreatedAt())) {
            $arr['createdAt'] = $entity->getCreatedAt();
        }

        return $arr;
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

    /**
     * @param RuleEntity[] $rules
     * @return array
     */
    function arrayOfEntityToArrayOfArray(array $rules): array
    {
        $res = [];

        foreach ($rules as $entity) {
            $res[] = $this->entityToArray($entity);
        }

        return $res;
    }
}
