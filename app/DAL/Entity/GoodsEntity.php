<?php
namespace App\DAL\Entity;

use DateTime;

/**
 * Class GoodsEntity
 * @package App\DAL\Entity
 */
class GoodsEntity
{

    private ?int $id = null;

    private ?string $title = null;

    private ?float $unitPrice = null;

    private ?DateTime $createdAt = null;

    private ?array $rules = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): GoodsEntity
    {
        $this->id = $id;
        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): GoodsEntity
    {
        $this->title = $title;
        return $this;
    }

    public function getUnitPrice(): ?float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(?float $unitPrice): GoodsEntity
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?DateTime $createdAt): GoodsEntity
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    public function getRules(): ?array
    {
        return $this->rules;
    }

    public function setRules(?array $rules): GoodsEntity
    {
        $this->rules = $rules;
        return $this;
    }
}
