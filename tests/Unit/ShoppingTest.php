<?php

namespace Tests\Unit;

use App\Action\ActionCoinChangeCalculation;
use PHPUnit\Framework\TestCase;

class ShoppingTest extends TestCase
{

    /**
     * A unit test for coin change calculation function.
     */
    public function testActionCoinChangeCalculation_findCombinationsUtil()
    {
        //Arrange
        $sut = new ActionCoinChangeCalculation();
        $numbers = [2, 5, 8];
        $quantity = 20;
        $expected = array(
            [2,2,2,2,2,2,2,2,2,2],
            [2,2,2,2,2,2,8],
            [2,2,2,2,2,5,5],
            [2,2,8,8],
            [2,5,5,8],
            [5,5,5,5]);

        //Assign
        //Different combinations from 2,5,8 that their summation is 20 are as below:
        // [[2,2,2,2,2,2,2,2,2,2], [2,2,2,2,2,2,8], [2,2,2,2,2,5,5], [2,2,8,8], [2,5,5,8], [5,5,5,5]]
        $actual = $sut->__invoke($quantity, $numbers);

        //Assert
        $this->assertIsArray($actual);
        $this->assertCount(6, $actual);
        $this->assertEquals($expected, $actual);
    }

}
