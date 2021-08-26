<?php

namespace Tests\Unit;

use App\Action\ActionCoinChangeCalculation;
use PHPUnit\Framework\TestCase;

class ActionCoinChangeCalculationTest extends TestCase
{
    /**
     * @param array $coins
     * @param int $amount
     * @param array $expected
     * @dataProvider coinChangeCalculatorDataProvider
     */
    public function testInvoke_shouldCalculate(array $coins, int $amount, array $expected): void
    {
        //Arrange
        $sut = new ActionCoinChangeCalculation();
        //Act
        $actual = ($sut)($amount, $coins);

        //Assert
        $this->assertIsArray($actual);
        $this->assertCount(6, $actual);
        $this->assertEquals($expected, $actual);
    }

    public function coinChangeCalculatorDataProvider(): array
    {
        return [
            [
                [2, 5, 8],
                20,
                [
                    [2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
                    [2, 2, 2, 2, 2, 2, 8],
                    [2, 2, 2, 2, 2, 5, 5],
                    [2, 2, 8, 8],
                    [2, 5, 5, 8],
                    [5, 5, 5, 5]]
            ],
            [
                [2, 5, 8],
                20,
                [
                    [2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
                    [2, 2, 2, 2, 2, 2, 8],
                    [2, 2, 2, 2, 2, 5, 5],
                    [2, 2, 8, 8],
                    [2, 5, 5, 8],
                    [5, 5, 5, 5]]
            ], //TODO: add more test cases
        ];
    }
}
