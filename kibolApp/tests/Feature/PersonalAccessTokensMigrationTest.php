<?php

namespace Tests\Migrations;

use Tests\TestCase;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonalAccessTokensMigrationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_personal_access_tokens_table()
    {
        $this->artisan('migrate', ['--path' => 'database/migrations']);

        $this->assertTrue(Schema::hasTable('personal_access_tokens'));

        $this->assertTrue(Schema::hasColumns('personal_access_tokens', [
            'id', 'tokenable_id', 'tokenable_type', 'name', 'token',
            'abilities', 'last_used_at', 'expires_at', 'created_at', 'updated_at'
        ]));
    }
}
