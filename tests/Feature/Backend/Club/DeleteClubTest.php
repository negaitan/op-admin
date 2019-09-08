<?php

namespace Tests\Feature\Backend\Club;

use Tests\TestCase;
use App\Models\Club;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Club\ClubRestored;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\Club\ClubPermanentlyDeleted;

class DeleteClubTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deleted_clubs_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/clubs/deleted');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_club_must_be_soft_deleted_before_permanently_deleted()
    {
        $this->loginAsAdmin();
        $club = factory(Club::class)->create();

        $response = $this->get("/admin/clubs/{$club->id}/delete");

        $response->assertSessionHas(['flash_danger' => __('backend_clubs.exceptions.delete_first')]);
    }

    /** @test */
    public function an_admin_can_restore_clubs()
    {
        $this->loginAsAdmin();
        $club = factory(Club::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/clubs/{$club->id}/restore");
        $response->assertSessionHas(['flash_success' => __('exceptions.backend.access.clubs.cant_restore')]);

        $this->assertNull($club->fresh()->deleted_at);
        Event::assertDispatched(ClubRestored::class);
    }

    /** @test */
    public function a_club_can_be_permanently_deleted()
    {
        $this->loginAsAdmin();
        $club = factory(Club::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/clubs/{$club->id}/delete");

        $this->assertNull($club->fresh());
        $response->assertSessionHas(['flash_success' => __('alerts.backend.clubs.deleted_permanently')]);
        Event::assertDispatched(ClubPermanentlyDeleted::class);
    }

    /** @test */
    public function a_not_deleted_club_cant_be_restored()
    {
        $this->loginAsAdmin();
        $club = factory(Club::class)->create();

        $response = $this->get("/admin/clubs/{$club->id}/restore");

        $response->assertSessionHas(['flash_danger' => __('backend_clubs.exceptions.cant_restore')]);
    }

    /** @test */
    public function a_club_can_be_deleted()
    {
        $this->loginAsAdmin();
        $club = factory(Club::class)->create();

        $response = $this->delete("/admin/clubs/{$club->id}/destroy");

        $response->assertSessionHas(['flash_success' => __('alerts.backend.clubs.deleted')]);
        $this->assertDatabaseMissing('clubs', ['id' => $club->id, 'deleted_at' => null]);
    }
}
