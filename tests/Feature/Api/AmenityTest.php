<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Amenity;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AmenityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_all_amenity_items()
    {
        $response = $this->ajaxGet('/api/amenities');

        $response->assertStatus(200);
    }

    /** @test */
    public function api_can_show_only_one_amenity()
    {
        $amenity = factory(Amenity::class)->create();

        $response = $this->ajaxGet("/api/amenities/{$amenity->id}");

        $response->assertStatus(200);
    }
}
