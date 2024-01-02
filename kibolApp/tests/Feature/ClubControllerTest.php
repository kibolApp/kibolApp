<?php

namespace Tests\Feature;

use App\Models\Clubs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClubControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_get_all_clubs()
    {
        Clubs::factory(5)->create();

        $response = $this->get('/api/clubs');

        $response->assertStatus(200)
            ->assertJsonCount(5)
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'team',
                    'latitude',
                    'longitude',
                    'address',
                    'url_logo',
                    'url',
                ],
            ]);
    }
}
