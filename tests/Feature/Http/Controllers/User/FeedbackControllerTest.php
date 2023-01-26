<?php

namespace Tests\Feature\Http\Controllers\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndexSuccessStatus(): void
    {
        $response = $this->get(route('user.feedback.index'));

        $response->assertStatus(200);
    }

    public function testCreateSuccessStatus(): void
    {
        $response = $this->get(route('user.feedback.create'));

        $response->assertStatus(200);
    }

    public function testCreateSaveSuccess(): void
    {
        $data = [
            'name' => \fake()->userName(),
            'comments' => \fake()->text(100)
        ];
        $response = $this->post(route('user.feedback.store'), $data);

        $response->assertStatus(200)
            ->json($data);
    }
}
