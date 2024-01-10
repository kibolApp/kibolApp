<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Hash;


class ApiRoutesTest extends TestCase
{
    use RefreshDatabase;

    public function testClubRoutes()
    {
        $response = $this->getJson('/api/clubs');
        $response->assertStatus(200);
    }
    public function testGetUsers()
    {
        $response = $this->getJson('/api/users');
        $response->assertStatus(200);
    }
    public function testCantEnterMapWithoutLoggingIn(): void
    {
        $response = $this->get("/App");

        $response->assertStatus(404);
    }
    public function testCantEnterClubListWithoutLoggingIn(): void
    {
        $response = $this->get("/clublist");

        $response->assertStatus(404);
    }
    public function testCantEnterProfileWithoutLoggingIn(): void
    {
        $response = $this->get("/Profile");

        $response->assertStatus(404);
    }
    public function testPostUsersRoute()
    {
        $data = ['name' => 'John Doe', 'email' => 'john@example.com', 'password' => 'password'];
        $response = $this->post('/api/users', $data);
        $response->assertStatus(201);
    }
}
