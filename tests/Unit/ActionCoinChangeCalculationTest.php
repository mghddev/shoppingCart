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
                [20, 50, 80],
                10,
                []
            ],
            [
                [20, 50, 80],
                20,
                [[20]]
            ],
            [
                [5, 8],
                12,
                []
            ],
            [
                [1, 5, 8],
                12,
                [
                    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
                    [1, 1, 1, 1, 1, 1, 1, 5],
                    [1, 1, 1, 1, 8],
                    [1, 1, 5, 5]
                ]
            ],
            [
                [5, 8],
                13,
                [[5, 8]]
            ]
        ];
    }
}
