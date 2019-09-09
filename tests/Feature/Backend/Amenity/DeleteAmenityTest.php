<?php

namespace Tests\Feature\Backend\Amenity;

use Tests\TestCase;
use App\Models\Amenity;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Amenity\AmenityRestored;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\Amenity\AmenityPermanentlyDeleted;

class DeleteAmenityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deleted_amenities_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/amenities/deleted');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_amenity_must_be_soft_deleted_before_permanently_deleted()
    {
        $this->loginAsAdmin();
        $amenity = factory(Amenity::class)->create();

        $response = $this->get("/admin/amenities/{$amenity->id}/delete");

        $response->assertSessionHas(['flash_danger' => __('backend_amenities.exceptions.delete_first')]);
    }

    /** @test */
    public function an_admin_can_restore_amenities()
    {
        $this->loginAsAdmin();
        $amenity = factory(Amenity::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/amenities/{$amenity->id}/restore");
        $response->assertSessionHas(['flash_success' => __('exceptions.backend.access.amenities.cant_restore')]);

        $this->assertNull($amenity->fresh()->deleted_at);
        Event::assertDispatched(AmenityRestored::class);
    }

    /** @test */
    public function a_amenity_can_be_permanently_deleted()
    {
        $this->loginAsAdmin();
        $amenity = factory(Amenity::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/amenities/{$amenity->id}/delete");

        $this->assertNull($amenity->fresh());
        $response->assertSessionHas(['flash_success' => __('alerts.backend.amenities.deleted_permanently')]);
        Event::assertDispatched(AmenityPermanentlyDeleted::class);
    }

    /** @test */
    public function a_not_deleted_amenity_cant_be_restored()
    {
        $this->loginAsAdmin();
        $amenity = factory(Amenity::class)->create();

        $response = $this->get("/admin/amenities/{$amenity->id}/restore");

        $response->assertSessionHas(['flash_danger' => __('backend_amenities.exceptions.cant_restore')]);
    }

    /** @test */
    public function a_amenity_can_be_deleted()
    {
        $this->loginAsAdmin();
        $amenity = factory(Amenity::class)->create();

        $response = $this->delete("/admin/amenities/{$amenity->id}/destroy");

        $response->assertSessionHas(['flash_success' => __('alerts.backend.amenities.deleted')]);
        $this->assertDatabaseMissing('amenities', ['id' => $amenity->id, 'deleted_at' => null]);
    }
}
