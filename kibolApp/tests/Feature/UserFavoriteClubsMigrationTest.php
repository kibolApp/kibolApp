<?php

namespace Tests\Migrations;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class UserFavoriteClubsMigrationTest extends TestCase
{
    use RefreshDatabase;

    public function testUserFavoriteClubsTable()
    {
        $this->assertTrue(Schema::hasTable('user_favorite_clubs'));
        $this->assertTrue(Schema::hasColumns('user_favorite_clubs', [
            'id', 'user_id', 'club_id', 'created_at', 'updated_at'
        ]));
    }
}
