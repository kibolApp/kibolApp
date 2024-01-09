<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    use RefreshDatabase;

    public function testUserCanSignup(): void
    {
        $response = $this->post('/api/register', [
            "name" => "Test",
            "email" => "test@example.com",
            "password" => "123456789@wsx",
            "password_confirmation" => "123456789@wsx",
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'Test',
            'email' => 'test@example.com',
        ]);

        $response->assertStatus(200);
    }

    public function testUserCannotSignupWithInvalidDataSuchAsWrongPasswordConfirmation(): void
    {
        $response = $this->post('/api/register', [
            "name" => "JoeDoe",
            "email" => "example@example.com",
            "password" => "123456789@wsx",
            "password_confirmation" => "3456789@wsx",
        ]);

        $this->assertDatabaseMissing('users', [
            "name" => "JoeDoe",
            'email' => 'example@example.com',
        ]);

        $response->assertStatus(302);
    }

    public function testUserCannotSignupWithInvalidDataLikeWrongEmail(): void
    {
        $response = $this->post('/api/register', [
            "name" => "example",
            "email" => "exa",
            "password" => "123",
            "password_confirmation" => "123",
        ]);

        $this->assertDatabaseMissing('users', [
            "name" => "example",
            'email' => 'exa',
        ]);
        $response->assertStatus(302)
            ->assertSessionHasErrors(['email']);
    }
}
