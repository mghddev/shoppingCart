<?php

namespace Tests\Feature;

use App\Constant\RouteName;
use App\DAL\Model\Goods;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class HttpApiCalculatePriceTest extends TestCase
{
    use WithFaker;
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function testInvoke_shouldReturnOk(): void
    {
        //Arrange
        $goods = Goods::factory()->count(10)->create();
        $items = $goods->pluck('id')->toArray();
        $input = ['items' => implode(',', $items)];

        //Act
        $response = $this->post(route(RouteName::CALCULATE_PRICE), $input);

        //Assert
        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonFragment([
                'title' => 'Total price',
                'quantity' => count($items)
            ]);
    }

    public function testInvoke_shouldReturnUnprocessableEntity(): void
    {
        //Arrange
        $input = ['items' => ''];

        //Act
        $response = $this->post(route(RouteName::CALCULATE_PRICE), $input);

        //Assert
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson([
                'message' => 'validation exception message',
                'code' => 20000,
                'errors' => ['items' => ['The items field is required.']]
                ]);
    }

    public function testInvoke_shouldReturnNotFound(): void
    {
        //Arrange
        $items = $this->faker->hslColorAsArray;
        $input = ['items' => implode(',', $items)];

        //Act
        $response = $this->post(route(RouteName::CALCULATE_PRICE), $input);

        //Assert
        $response->assertStatus(Response::HTTP_NOT_FOUND)
            ->assertJsonFragment([ 'code' => 20001]);
    }
}
