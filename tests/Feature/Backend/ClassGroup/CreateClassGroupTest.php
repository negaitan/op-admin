<?php

namespace Tests\Feature\Backend\ClassGroup;

use Tests\TestCase;
use App\Models\ClassGroup;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\ClassGroup\ClassGroupCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateClassGroupTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_create_class_group_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/class_groups/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function create_class_group_has_required_fields()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/class_groups/store', []);

        $response->assertSessionHasErrors([
            'name',
            'logo_image_id',
            'description',
            'cover_image_id',
            'video_url',
            'classes',
            'teacher_image_id',
            'teacher_name',
            'teacher_title',
            'teacher_text',
            'playlist_url',
        ]);
    }

    /** @test */
    public function admin_can_create_new_class_group()
    {
        $this->loginAsAdmin();
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $data = factory(ClassGroup::class)->raw(['name' => 'John']);

        $response = $this->post('/admin/class_groups/store', $data);

        $this->assertDatabaseHas(
            'class_groups',
            [
                'name' => 'John',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('backend_class_groups.alerts.created')]);
        Event::assertDispatched(ClassGroupCreated::class);
    }
}
