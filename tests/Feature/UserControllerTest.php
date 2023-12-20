<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        // Run database migrations
        Artisan::call('migrate');
    }

    /** @test */
    public function it_can_create_a_user()
    {
        $data = [
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com',
            'phone' => '01772119941',
            'address' => 'framgate',
            'country' => 'bangladesh',
            'city' => 'dhaka',
            'password' => bcrypt('secret'),
        ];

        $response = $this->json('POST', 'api/user/store', $data);

        $response->assertStatus(201); // 201 Created
    }

    /** @test */
    public function it_can_show_a_user()
    {
        $user = User::factory()->create();

        $response = $this->json('GET', "api/user/edit/{$user->id}");

        $response->assertStatus(200); // 200 OK

        $response->assertJson([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                // Add other attributes as needed
            ],
        ]);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            // 'phone' => $user->phone,
            // 'address' => $user->address,
            // 'country' => $user->country,
            // 'city' => $user->city
        ]);
    }

    /** @test */
    public function it_can_update_a_user()
    {
        $user = User::factory()->create();

        $updatedData = [
            'name' => 'John Does',
            'email' => 'john.does@gmail.com',
            'phone' => '01772119945',
            'address' => 'mirpur',
            'country' => 'bangladesh',
            'city' => 'dhaka',
            'password' => bcrypt('secret'),
        ];

        $response = $this->json('PUT', "api/user/update/{$user->id}", $updatedData);

        $response->assertStatus(200); // 200 OK
    }

    /** @test */
    public function it_can_delete_a_user()
    {
        $user = User::factory()->create();

        $response = $this->json('DELETE', "api/user/destroy/{$user->id}");

        $response->assertStatus(204); // 204 No Content

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

}
