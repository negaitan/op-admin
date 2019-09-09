<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Club;
use App\Models\Image;
use App\Models\WebText;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Amenity;

class ClubModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_only_one_webText()
    {
        $club = factory(Club::class)->create();

        $club->webText()->create(factory(WebText::class)->state('exposed')->raw());

        $this->assertInstanceOf(WebText::class, $club->webText);
    }

    /** @test */
    public function it_can_has_many_images()
    {
        $club = factory(Club::class)->create();

        $club->images()->create(factory(Image::class)->raw());

        $this->assertInstanceOf(Image::class, $club->images->first());
    }

    /** @test */
    public function it_can_has_many_amenities()
    {
        $club = factory(Club::class)->create();

        $club->amenities()->create(factory(Amenity::class)->raw());

        $this->assertInstanceOf(Amenity::class, $club->amenities->first());
    }
}
