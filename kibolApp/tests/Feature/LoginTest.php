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

    public function testWrongEmail(): void
    {
        $response = $this->post('/api/login', [
            'email' => 'invalid-email',
            'password' => 'invalid-password',
        ]);

        $response->assertStatus(302)
            ->assertSessionHasErrors(['email']);
    }
    public function testLoginRouteIncorrectUserEmail(): void
    {

        $this->post('/api/register', [
            'name' => 'John Doe',
            'email' => 'john1@example.com',
            'password' => 'Password123',
        ]);

        $response = $this->post('/api/login', [
            'email' => 'john12@example.com',
            'password' => 'Password123',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect();

        $response = $this->followRedirects($response);

        $response->assertStatus(200);
        $response->assertSessionHasErrors(['email']);
    }
}
