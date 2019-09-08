<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClubTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_all_club_items()
    {
        $response = $this->ajaxGet('/api/clubs');

        $response->assertStatus(200);
    }

    /** @test */
    public function api_can_show_only_one_club()
    {
        $this->withoutExceptionHandling();
        $club = factory(Club::class)->create();

        $response = $this->ajaxGet("/api/clubs/{$club->id}");

        $response->assertStatus(200);
    }
}
