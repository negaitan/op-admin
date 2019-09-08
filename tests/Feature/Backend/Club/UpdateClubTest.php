<?php

namespace Tests\Feature\Backend\Club;

use Tests\TestCase;
use App\Models\Club;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Club\ClubUpdated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateClubTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_edit_club_page()
    {
        $this->loginAsAdmin();
        $club = factory(Club::class)->create();

        $response = $this->get('/admin/clubs/'.$club->id.'/edit');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_club_can_be_updated()
    {
        $this->loginAsAdmin();
        $club = factory(Club::class)->create();
        Event::fake();

        $this->assertNotSame('John', $club->title);

        $this->patch("/admin/clubs/{$club->id}/update", [
            'title' => 'John',
        ]);

        $this->assertSame('John', $club->fresh()->title);

        Event::assertDispatched(ClubUpdated::class);
    }
}
