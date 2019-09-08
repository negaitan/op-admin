<?php

namespace Tests\Feature\Backend\Image;

use Tests\TestCase;
use App\Models\Image;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Image\ImageUpdated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_edit_image_page()
    {
        $this->loginAsAdmin();
        $image = factory(Image::class)->create();

        $response = $this->get('/admin/images/'.$image->id.'/edit');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_image_can_be_updated()
    {
        $this->loginAsAdmin();
        $image = factory(Image::class)->create();
        Event::fake();

        $this->assertNotSame('John', $image->internal_key);

        $data = factory(Image::class)->raw(['internal_key' => 'John']);

        $this->patch("/admin/images/{$image->id}/update", $data);

        $this->assertSame('John', $image->fresh()->internal_key);

        Event::assertDispatched(ImageUpdated::class);
    }
}
