<?php
namespace App\DAL\DTO;

/**
 * Class PriceDTO
 * @package App\DAL\DTO
 */
class PriceDTO
{

    /**
     * @var string
     */
    protected string $name;

    /**
     * @var int
     */
    protected int $quantity;

    /**
     * @var float
     */
    protected float $price;

    /**
     * @var float|int
     */
    protected float $purchaseProfit = 0;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): PriceDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return $this
     */
    public function setQuantity(int $quantity): PriceDTO
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return $this
     */
    public function setPrice(float $price): PriceDTO
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return float|int
     */
    public function getPurchaseProfit()
    {
        return $this->purchaseProfit;
    }

    /**
     * @param $purchaseProfit
     * @return $this
     */
    public function setPurchaseProfit($purchaseProfit): PriceDTO
    {
        $this->purchaseProfit = $purchaseProfit;
        return $this;
    }
}
