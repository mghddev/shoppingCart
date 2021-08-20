<?php
namespace App\Hydrate;

use App\DAL\Entity\GoodsEntity;
use DateTime;
use Exception;

/**
 * Class GoodsHyd
 * @package App\Hydrate
 */
class GoodsHyd
{
    private RuleHyd $ruleHyd;

    /**
     * @var GoodsEntity
     */
    protected GoodsEntity $entity;

    /**
     * GoodsHyd constructor.
     * @param RuleHyd $ruleHyd
     */
    public function __construct(RuleHyd $ruleHyd)
    {
        $this->ruleHyd = $ruleHyd;
    }


    /**
     * @param array $data
     * @return $this
     * @throws Exception
     */
    function fromArray(array $data) : GoodsHyd
    {
        $this->entity = $this->arrayToEntity($data);

        return $this;
    }

    /**
     * @param GoodsEntity $entity
     * @return $this
     */
    function fromEntity(GoodsEntity $entity): GoodsHyd
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
     * @return GoodsEntity
     */
    function toEntity(): GoodsEntity
    {
        return $this->entity;
    }

    /**
     * @param array $data
     * @return GoodsEntity
     * @throws Exception
     */
    private function arrayToEntity(array $data): GoodsEntity
    {
        $entity = new GoodsEntity();

        if (isset($data['id'])) {
            $entity->setId($data['id']);
        }

        if (isset($data['title'])) {
            $entity->setTitle($data['title']);
        }

        if (isset($data['unitPrice'])) {
            $entity->setUnitPrice($data['unitPrice']);
        }

        if (isset($data['rules']) && !empty($data['rules'])) {
            $entity->setRules($this->ruleHyd->arrayOfArrayToArrayOfEntities($data['rules']));
        }

        if (isset($data['createdAt'])) {
            $entity->setCreatedAt(!empty($data['createdAt']) ? new DateTime($data['createdAt']) : null);
        }

        return $entity;
    }

    /**
     * @param GoodsEntity $entity
     * @return array
     */
    private function entityToArray(GoodsEntity $entity): array
    {
        $arr = [];

        if(!empty($entity->getId())) {
            $arr['id'] = $entity->getId();
        }

        if(!empty($entity->getTitle())) {
            $arr['title'] = $entity->getTitle();
        }

        if(!empty($entity->getUnitPrice())) {
            $arr['unitPrice'] = $entity->getUnitPrice();
        }

        if(!empty($entity->getRules())) {
            $arr['rules'] = $this->ruleHyd->arrayOfEntityToArrayOfArray($entity->getRules());
        }

        if(!empty($entity->getCreatedAt())) {
            $arr['createdAt'] = $entity->getCreatedAt();
        }

        return $arr;
    }

    /**
     * @param array $goodsItems
     * @return array
     * @throws Exception
     */
    function arrayOfArrayToArrayOfEntities(array $goodsItems): array
    {
        $res = [];

        foreach ($goodsItems as $item) {
            $res[] = $this->arrayToEntity($item);
        }

        return $res;
    }

    /**
     * @param GoodsEntity[] $goodsItems
     * @return array
     */
    function arrayOfEntityToArrayOfArray(array $goodsItems): array
    {
        $res = [];

        foreach ($goodsItems as $entity) {
            $res[] = $this->entityToArray($entity);
        }

        return $res;
    }
}