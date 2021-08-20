<?php
namespace App\DAL\Entity;

use DateTime;

/**
 * Class RuleEntity
 * @package App\DAL\Entity
 */
class RuleEntity
{

    /**
     * @var int|null
     */
    private ?int $id = null;

    /**
     * @var int|null
     */
    private ?int $goodsId = null;

    /**
     * @var GoodsEntity|null
     */
    private ?GoodsEntity $goodsEntity = null;

    /**
     * @var int|null
     */
    private ?int $quantity = null;

    /**
     * @var float|null
     */
    private ?float $specialPrice = null;

    /**
     * @var bool|null
     */
    private ?bool $isActive = null;

    /**
     * @var DateTime|null
     */
    private ?DateTime $createdAt = null;

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
    public function setId(?int $id): RuleEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getGoodsId(): ?int
    {
        return $this->goodsId;
    }

    /**
     * @param int|null $goodsId
     * @return $this
     */
    public function setGoodsId(?int $goodsId): RuleEntity
    {
        $this->goodsId = $goodsId;
        return $this;
    }

    /**
     * @return GoodsEntity|null
     */
    public function getGoodsEntity(): ?GoodsEntity
    {
        return $this->goodsEntity;
    }

    /**
     * @param GoodsEntity|null $goodsEntity
     * @return $this
     */
    public function setGoodsEntity(?GoodsEntity $goodsEntity): RuleEntity
    {
        $this->goodsEntity = $goodsEntity;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     * @return $this
     */
    public function setQuantity(?int $quantity): RuleEntity
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getSpecialPrice(): ?float
    {
        return $this->specialPrice;
    }

    /**
     * @param float|null $specialPrice
     * @return $this
     */
    public function setSpecialPrice(?float $specialPrice): RuleEntity
    {
        $this->specialPrice = $specialPrice;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    /**
     * @param bool|null $isActive
     * @return $this
     */
    public function setIsActive(?bool $isActive): RuleEntity
    {
        $this->isActive = $isActive;
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
    public function setCreatedAt(?DateTime $createdAt): RuleEntity
    {
        $this->createdAt = $createdAt;
        return $this;
    }

}
