<?php

namespace Tests\Feature\Backend\Amenity;

use Tests\TestCase;
use App\Models\Amenity;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadAmenitysTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_active_amenities_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/amenities/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_view_single_amenity_page()
    {
        $this->loginAsAdmin();
        $amenity = factory(Amenity::class)->create();

        $response = $this->get("/admin/amenities/{$amenity->id}");

        $response->assertStatus(200);
    }
}
