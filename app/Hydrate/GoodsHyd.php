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

    protected GoodsEntity $entity;

    public function __construct(private RuleHyd $ruleHyd)
    {}


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

        if (isset($data['unit_price'])) {
            $entity->setUnitPrice($data['unit_price']);
        }

        if (isset($data['rules']) && !empty($data['rules'])) {
            $entity->setRules($this->ruleHyd->arrayOfArrayToArrayOfEntities($data['rules']));
        }

        if (isset($data['created_at'])) {
            $entity->setCreatedAt(!empty($data['created_at']) ? new DateTime($data['created_at']) : null);
        }

        return $entity;
    }

}
