<?php

namespace Tests\Feature\Backend\Amenity;

use Tests\TestCase;
use App\Models\Amenity;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Amenity\AmenityUpdated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateAmenityTest extends TestCase
{
    use RefreshDatabase;

    protected function getValidAmenityData($amenityData = [])
    {
        return array_merge(factory(Amenity::class)->raw(), $amenityData);
    }

    /** @test */
    public function an_admin_can_access_the_edit_amenity_page()
    {
        $this->loginAsAdmin();
        $amenity = factory(Amenity::class)->create();

        $response = $this->get('/admin/amenities/'.$amenity->id.'/edit');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_amenity_can_be_updated()
    {
        $this->loginAsAdmin();
        $amenity = factory(Amenity::class)->create();
        Event::fake();

        $this->assertNotSame('John', $amenity->key);

        $this->patch("/admin/amenities/{$amenity->id}/update", $this->getValidAmenityData([
            'key' => 'John',
        ]));

        $this->assertSame('John', $amenity->fresh()->key);

        Event::assertDispatched(AmenityUpdated::class);
    }
}
