<?php
namespace App\DAL\Entity;

use DateTime;

/**
 * Class GoodsEntity
 * @package App\DAL\Entity
 */
class GoodsEntity
{
    /**
     * @var int|null
     */
    private ?int $id = null;

    /**
     * @var string|null
     */
    private ?string $title = null;

    /**
     * @var float|null
     */
    private ?float $unitPrice = null;

    /**
     * @var DateTime|null
     */
    private ?DateTime $createdAt = null;

    /**
     * @var RuleEntity[]|null
     */
    private ?array $rules = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return $this
     */
    public function setId(?int $id): GoodsEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     * @return $this
     */
    public function setTitle(?string $title): GoodsEntity
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getUnitPrice(): ?float
    {
        return $this->unitPrice;
    }

    /**
     * @param float|null $unitPrice
     * @return $this
     */
    public function setUnitPrice(?float $unitPrice): GoodsEntity
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime|null $createdAt
     * @return $this
     */
    public function setCreatedAt(?DateTime $createdAt): GoodsEntity
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return RuleEntity[]|null
     */
    public function getRules(): ?array
    {
        return $this->rules;
    }

    /**
     * @param RuleEntity[]|null $rules
     * @return $this
     */
    public function setRules(?array $rules): GoodsEntity
    {
        $this->rules = $rules;
        return $this;
    }
}
