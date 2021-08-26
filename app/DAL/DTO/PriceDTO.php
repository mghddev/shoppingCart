<?php

namespace App\DAL\DTO;

class PriceDTO
{
    protected string $name;
    protected int $quantity;
    protected float $price;
    protected float $purchaseProfit = 0;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): PriceDTO
    {
        $this->name = $name;

        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): PriceDTO
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price): PriceDTO
    {
        $this->price = $price;

        return $this;
    }

    public function getPurchaseProfit(): float
    {
        return $this->purchaseProfit;
    }

    public function setPurchaseProfit($purchaseProfit): PriceDTO
    {
        $this->purchaseProfit = $purchaseProfit;

        return $this;
    }
}
