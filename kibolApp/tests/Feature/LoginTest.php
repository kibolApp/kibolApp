<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function testUserCanLogin(): void
    {

        $user = User::factory()->create([
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'),
        ]);

        $loginData = [
            'email' => 'john.doe@example.com',
            'password' => 'password123',
        ];

        $response = $this->post('/api/login', $loginData);

        $response->assertJsonStructure([
            'user' => [
                'id',
                'name',
                'email',
                'email_verified_at',
                'team_id',
                'created_at',
                'updated_at',
            ],
            'token'
        ]);

        $response->assertStatus(200);
        $this->assertAuthenticated();
    }

    public function testUserCantLoginWithWrongCredentials(): void
    {
        $user = User::factory()->create([
            'email' => 'joe.doe@example.com',
            'password' => Hash::make('password@H123'),
        ]);

        $loginData = [
            'email' => 'joe.doe@example.com',
            'password' => '123',
        ];

        $response = $this->post('/api/login', $loginData);

        $response->assertStatus(200);

        $response->assertJson([
            'message' => 'Something wrong',
        ]);

        $this->assertGuest();
    }
}
