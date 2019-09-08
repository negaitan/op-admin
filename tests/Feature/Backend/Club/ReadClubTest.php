<?php

namespace Tests\Feature\Backend\Club;

use Tests\TestCase;
use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadClubsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_active_clubs_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/clubs/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_view_single_club_page()
    {
        $this->loginAsAdmin();
        $club = factory(Club::class)->create();

        $response = $this->get("/admin/clubs/{$club->id}");

        $response->assertStatus(200);
    }
}
