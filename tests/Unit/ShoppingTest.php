<?php

namespace Tests\Unit;

use App\Action\ActionCoinChangeCalculation;
use PHPUnit\Framework\TestCase;

class ShoppingTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {

        $calculator = new ActionCoinChangeCalculation();
        $numbers = [2, 5, 8];
        $quantity = 20;

        //Different combinations from 2,5,8 that their summation is 20 are as below:
        // [[2,2,2,2,2,2,2,2,2,2], [2,2,2,2,2,2,8], [2,2,2,2,2,5,5], [2,2,8,8], [2,5,5,8], [5,5,5,5]]
        $arr = $calculator->__invoke($quantity, $numbers);
        $this->assertIsArray($arr);
        $this->assertCount(6, $arr);
        $this->assertEquals(array(
            [2,2,2,2,2,2,2,2,2,2],
            [2,2,2,2,2,2,8],
            [2,2,2,2,2,5,5],
            [2,2,8,8],
            [2,5,5,8],
            [5,5,5,5]),
            $arr);
    }
}
