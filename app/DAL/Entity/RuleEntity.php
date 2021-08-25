<?php
namespace App\DAL\Entity;

use DateTime;

/**
 * Class RuleEntity
 * @package App\DAL\Entity
 */
class RuleEntity
{

    private ?int $id = null;

    private ?int $goodsId = null;

    private ?GoodsEntity $goodsEntity = null;

    private ?int $quantity = null;

    private ?float $specialPrice = null;

    private ?bool $isActive = null;

    private ?DateTime $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): RuleEntity
    {
        $this->id = $id;
        return $this;
    }

    public function getGoodsId(): ?int
    {
        return $this->goodsId;
    }

    public function setGoodsId(?int $goodsId): RuleEntity
    {
        $this->goodsId = $goodsId;
        return $this;
    }

    public function getGoodsEntity(): ?GoodsEntity
    {
        return $this->goodsEntity;
    }

    public function setGoodsEntity(?GoodsEntity $goodsEntity): RuleEntity
    {
        $this->goodsEntity = $goodsEntity;
        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(?int $quantity): RuleEntity
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getSpecialPrice(): ?float
    {
        return $this->specialPrice;
    }

    public function setSpecialPrice(?float $specialPrice): RuleEntity
    {
        $this->specialPrice = $specialPrice;
        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(?bool $isActive): RuleEntity
    {
        $this->isActive = $isActive;
        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTime $createdAt): RuleEntity
    {
        $this->createdAt = $createdAt;
        return $this;
    }

}
