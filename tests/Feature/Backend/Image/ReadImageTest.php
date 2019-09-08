<?php

namespace Tests\Feature\Backend\Image;

use Tests\TestCase;
use App\Models\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadImagesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_active_images_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/images/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_view_single_image_page()
    {
        $this->loginAsAdmin();
        $image = factory(Image::class)->create();

        $response = $this->get("/admin/images/{$image->id}");

        $response->assertStatus(200);
    }
}
