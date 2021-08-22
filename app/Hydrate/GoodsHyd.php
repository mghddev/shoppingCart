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

}
