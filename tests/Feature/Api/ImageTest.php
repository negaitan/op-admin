<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_all_image_items()
    {
        $response = $this->ajaxGet('/api/images');

        $response->assertStatus(200);
    }

    /** @test */
    public function api_can_show_only_one_image()
    {
        $image = factory(Image::class)->create();

        $response = $this->ajaxGet("/api/images/{$image->id}");

        $response->assertStatus(200);
    }
}
