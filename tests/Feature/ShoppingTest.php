<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

/**
 * Class ShoppingTest
 * @package Tests\Feature
 */
class ShoppingTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCalculatePriceApi()
    {
        //Validation exception handling test
        $response = $this->post('/api/price');

        $response->assertStatus(400)
            ->assertJsonFragment([ "code" => 20000]);


        //Item Not Found exception handling test (there is not any item with id = 8)
        $response = $this->post('/api/price', ['items' => '1,2,2,2,5,7,8']);

        $response->assertStatus(404)
            ->assertJsonFragment(["code" => 20001]);

        //Success calculation
        $items = array(1,2,2,2,5,7,6,6,5,4,2,3,4,2,1);
        $response = $this->post('/api/price', ['items' => implode(',', $items)]);

        $response->assertStatus(200)
            ->assertJsonFragment([
                "title" => "Total price",
                "quantity" => count($items)
            ]);

    }

    public function tearDown(): void
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }
}
