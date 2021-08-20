<?php
namespace App\Action;


class CoinManager
{

    private ?array $coins = null;
    private ?array $limits = null;
    private ?array $changed = null;

    /**
     * Constructor for CoinManager class
     * @param array $coins Array of coins
     * @param array [$limited] Limitation for each coins
     */
    public function __construct(array $coins, $limits = null)
    {
        if (!isset($coins)) {
            $coins = [];
        }
        if (!isset($limits)) {
            $limits = [];
        }
        $this->limits = $limits;
        $this->coins = $coins;
    }

    /**
     * Set the supply for each denominations
     * @param array $limits Array of limits for each denominations
     */
    public function setLimits(array $limits): CoinManager
    {
        if (!isset($limits)) {
            $limits = [];
        }
        $this->limits = $limits;
        return $this;
    }

    /**
     * Get the supply for each denominations
     * @return array|null
     */
    public function getLimits(): ?array
    {
        return $this->limits;
    }

    /**
     * Gives the coins to make amount
     *
     * @param int $amount
     * @return array|false|int|null
     * The method returns -1 if the amount isn't exchangable. If an error occurs the method returns FALSE.
     */
    public function getChange(int $amount): array
    {
        $this->changed = [];

        if ($this->isLimited() && count($this->limits) != count($this->coins)) {
            return false;
        }

        $this->changed = $this->makeChange($amount);

        return $this->changed;
    }

    /**
     * Get coins with each amounts
     * returns an associative array with key => Coin type, value => number of coins
     * @param array $coins
     * @return array|false
     */
    public function groupBy(array $coins): array
    {
        $groups = [];
        if (!isset($coins) || $coins < 0) {
            return FALSE;
        }
        for ($k = 0; $k < count($coins); $k++) {
            $coin = strval($coins[$k]);
            if (!array_key_exists($coin, $groups) && !isset($groups[$coin])) {
                $groups[$coin] = 1;
            } else {
                $counter = $groups[$coin] + 1;
                $groups[$coin] = $counter;
            }
        }

        return $groups;
    }

    /**
     * Greedy Algorithm approach
     *
     * @param int $amount
     * @return array|int|null
     */
    private function makeChange(int $amount): array
    {
        $maxCoin = 0;
        $sum = 0;
        $limited = $this->isLimited();

        while ($sum < $amount) {
            $maxCoin = $this->getLocalMax($amount, $sum);
            if (!isset($maxCoin)) {
                return -1;
            }

            if ($limited && $this->checkQuantity($maxCoin)) {
                array_push($this->changed, $maxCoin);
                $this->setQuantity($maxCoin, $this->popQuantity($maxCoin));
                $sum = $sum + $maxCoin;
            } else if (!$limited) {
                array_push($this->changed, $maxCoin);
                $sum = $sum + $maxCoin;
            }
        }

        return $this->changed;
    }

    /**
     * Checks if there is disponibility for the given coin
     * returns TRUE if the coin is available, FALSE otherwise.
     * @param int $coin
     * @return bool
     */
    private function checkQuantity(int $coin): bool
    {
        $result = TRUE;
        if ($this->getQuantity($coin) <= 0) {
            $result = FALSE;
        }
        return $result;
    }

    /**
     * Get the coin's index into array
     * return the coin's index into array
     * @param $key
     * @return false|int|string
     */
    private function getIndex($key)
    {
        return array_search($key, $this->coins);
    }

    /**
     * Get the remaining amount for the given coin
     * return the quantity for the given coin
     * @param int $coin
     * @return mixed
     */
    private function getQuantity(int $coin)
    {
        $index = $this->getIndex($coin);
        return $this->limits[$index];
    }

    /**
     * Set the remaining amount for the given coin
     *
     * @param int $coin
     * @param int $newQuantity
     */
    private function setQuantity(int $coin, int $newQuantity)
    {
        $index = $this->getIndex($coin);
        $this->limits[$index] = $newQuantity;
    }

    /**
     * Removes one unit of given coin
     * Returns the new quantity for the given coin
     * @param int $coin
     * @return int|mixed
     */
    private function popQuantity(int $coin)
    {
        $quantity = $this->getQuantity($coin);
        return $quantity - 1;
    }

    /**
     * Adds one unit of given coin
     * Returns the new quantity for the given coin
     * @param int $coin
     * @return int|mixed
     */
    private function pushQuantity(int $coin)
    {
        $quantity = $this->getQuantity($coin);
        return $quantity + 1;
    }

    /**
     * Check if there is a limitation for each coins
     * Returns TRUE if there is a limit of coins set, FALSE otherwise
     *
     * @return bool
     */
    private function isLimited(): bool
    {
        if (count($this->limits) <= 0) {
            return FALSE;
        }
        return TRUE;
    }

    /**
     * Retrieves the first biggest coin available
     * Returns the first bigger coin available
     *
     * @param int $amount
     * @param int $sum
     * @return mixed|null
     */
    private function getLocalMax(int $amount, int $sum)
    {
        $max = null;
        $coins = $this->coins;
        for ($k = 0; $k < count($coins); $k++) {
            if (($coins[$k] + $sum <= $amount) && (!$this->isLimited() || $this->checkQuantity($coins[$k]))) {
                $max = $coins[$k];
                break;
            }
        }
        return $max;
    }
}
