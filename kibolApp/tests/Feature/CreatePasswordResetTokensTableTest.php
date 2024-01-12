<?php

namespace Tests\Feature\Migrations;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;

class CreatePasswordResetTokensTableTest extends TestCase
{
    use RefreshDatabase;

    public function testItCreatesPasswordResetTokensTable()
    {
        $this->artisan('migrate');

        $this->assertTrue(Schema::hasTable('password_reset_tokens'));
        $this->assertTrue(Schema::hasColumns('password_reset_tokens', [
            'email', 'token', 'created_at'
        ]));
    }
    public function testItDropsPasswordResetTokensTable()
    {
        $this->artisan('migrate');

        $this->assertTrue(Schema::hasTable('password_reset_tokens'));

        Schema::dropIfExists('password_reset_tokens');

        $this->assertFalse(Schema::hasTable('password_reset_tokens'));
    }
}
