<?php

namespace Tests\Feature\Http\Controllers\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrdersControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('user.orders.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('user.orders.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccessData(): void
    {
        $data = [
            'userName' => \fake()->userName(),
            'phone' => \fake()->phoneNumber(),
            'mail' => \fake()->email(),
            'description' => \fake()->text(100),
        ];

        $response = $this->post(route('user.orders.store'), $data);

        $response->assertStatus(200)->json($data);
    }
}
