<?php

namespace Tests\Unit;

use App\Models\Clubs;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClubsTest extends TestCase
{
    use RefreshDatabase;

    public function testClubInitializationWithValidData()
    {
        $club = new Clubs([
            'team' => 'Example Team',
            'latitude' => 123.456,
            'longitude' => 789.012,
            'address' => 'Example Address',
            'url_logo' => 'https://example.com/logo.png',
            'url' => 'https://example.com',
        ]);

        $this->assertEquals('Example Team', $club->team);
        $this->assertEquals(123.456, $club->latitude);
        $this->assertEquals(789.012, $club->longitude);
        $this->assertEquals('Example Address', $club->address);
        $this->assertEquals('https://example.com/logo.png', $club->url_logo);
        $this->assertEquals('https://example.com', $club->url);

        $club->save();

        $this->assertDatabaseHas('clubs', [
            'team' => 'Example Team',
        ]);
    }
}
