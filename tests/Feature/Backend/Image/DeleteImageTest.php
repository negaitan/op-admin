<?php

namespace Tests\Feature\Backend\Image;

use Tests\TestCase;
use App\Models\Image;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Image\ImageRestored;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\Image\ImagePermanentlyDeleted;

class DeleteImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deleted_images_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/images/deleted');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_image_must_be_soft_deleted_before_permanently_deleted()
    {
        $this->loginAsAdmin();
        $image = factory(Image::class)->create();

        $response = $this->get("/admin/images/{$image->id}/delete");

        $response->assertSessionHas(['flash_danger' => __('backend_images.exceptions.delete_first')]);
    }

    /** @test */
    public function an_admin_can_restore_images()
    {
        $this->loginAsAdmin();
        $image = factory(Image::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/images/{$image->id}/restore");
        $response->assertSessionHas(['flash_success' => __('exceptions.backend.access.images.cant_restore')]);

        $this->assertNull($image->fresh()->deleted_at);
        Event::assertDispatched(ImageRestored::class);
    }

    /** @test */
    public function a_image_can_be_permanently_deleted()
    {
        $this->loginAsAdmin();

        $image = factory(Image::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/images/{$image->id}/delete");

        $this->assertNull($image->fresh());
        $response->assertSessionHas(['flash_success' => __('alerts.backend.images.deleted_permanently')]);

        Event::assertDispatched(ImagePermanentlyDeleted::class);
    }

    /** @test */
    public function a_not_deleted_image_cant_be_restored()
    {
        $this->loginAsAdmin();
        $image = factory(Image::class)->create();

        $response = $this->get("/admin/images/{$image->id}/restore");

        $response->assertSessionHas(['flash_danger' => __('backend_images.exceptions.cant_restore')]);
    }

    /** @test */
    public function a_image_can_be_deleted()
    {
        $this->loginAsAdmin();
        $image = factory(Image::class)->create();

        $response = $this->delete("/admin/images/{$image->id}/destroy");

        $response->assertSessionHas(['flash_success' => __('alerts.backend.images.deleted')]);
        $this->assertDatabaseMissing('images', ['id' => $image->id, 'deleted_at' => null]);
    }
}
