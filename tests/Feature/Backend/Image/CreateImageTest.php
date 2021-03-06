<?php

namespace Tests\Feature\Backend\Image;

use Tests\TestCase;
use App\Models\Image;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Image\ImageCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class CreateImageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_create_image_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/images/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function create_image_has_required_fields()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/images/store', []);

        $response->assertSessionHasErrors([
            'internal_key',
            // 'url',
            'alt'
        ]);
    }

    /** @test */
    public function admin_can_create_new_image_with_image_file_to_upload()
    {
        config(['filesystems.disks.s3.AWS_ACCESS_KEY_ID' => 'SOME_DATA']);
        config(['filesystems.disks.s3.AWS_SECRET_ACCESS_KEY' => 'SOME_DATA']);

        $this->loginAsAdmin();

        // Fake any disk here
        Storage::fake('s3');

        $data = factory(Image::class)->raw(['internal_key' => 'John']);

        $data['image'] = UploadedFile::fake()->image('image.png');

        $response = $this->post('/admin/images/store', $data);

        $this->assertDatabaseHas(
            'images',
            [
                'internal_key' => 'John',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('backend_images.alerts.created')]);

        Storage::disk('s3')->assertExists('images/image.png');
    }

    /** @test */
    public function admin_can_create_new_image()
    {
        $this->loginAsAdmin();
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $data = factory(Image::class)->raw(['internal_key' => 'John']);

        $response = $this->post('/admin/images/store', $data);

        $this->assertDatabaseHas(
            'images',
            [
                'internal_key' => 'John',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('backend_images.alerts.created')]);
        Event::assertDispatched(ImageCreated::class);
    }
}
