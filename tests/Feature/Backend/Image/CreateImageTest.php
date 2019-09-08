<?php

namespace Tests\Feature\Backend\Image;

use Tests\TestCase;
use App\Models\Image;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Image\ImageCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

        $response->assertSessionHasErrors(['title']);
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

        $response = $this->post('/admin/images/store', [
            'title' => 'John',
        ]);

        $this->assertDatabaseHas(
            'images',
            [
                'title' => 'John',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('backend_images.alerts.created')]);
        Event::assertDispatched(ImageCreated::class);
    }
}
