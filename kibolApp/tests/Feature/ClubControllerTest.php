<?php

namespace Tests\Feature;

use App\Models\Clubs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClubControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testCanGetAllClubs()
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
    public function testDeleteClub(): void
    {
        $uniqueName = 'ClubToDelete_' . uniqid();
        $club = Clubs::factory()->create(['team' => $uniqueName]);

        $response = $this->delete("/api/clubs/{$club->id}");
        $response->assertStatus(200);
        $this->assertDatabaseMissing('clubs', ['team' => $uniqueName]);
    }
}
