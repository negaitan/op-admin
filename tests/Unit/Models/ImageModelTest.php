<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Club;
use App\Models\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImageModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_has_many_clubs()
    {
        $image = factory(Image::class)->create();

        $image->clubs()->create(factory(Club::class)->raw());

        $this->assertInstanceOf(Club::class, $image->clubs->first());
    }
}
