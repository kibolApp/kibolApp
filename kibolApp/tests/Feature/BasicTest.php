<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BasicTest extends TestCase
{

    public function testTheApplicationReturnsASuccessfulResponse(): void
    {
        $response = $this->get("/");

        $response->assertStatus(200);
    }

    public function testTheApplicationCanSeeBasicLaravelSite(): void
    {
        $response = $this->get("/");

        $response->assertSee('Laravel');

        $response->assertStatus(200);
    }

    public function testTheApllicationCantSeeOtherSites(): void
    {
        $response = $this->get("/");

        $response->assertDontSee('Welcome');

        $response->assertStatus(200);
    }
}
