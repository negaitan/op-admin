<?php

namespace Tests\Feature\Backend\GymClass;

use Tests\TestCase;
use App\Models\GymClass;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\GymClass\GymClassCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateGymClassTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_create_gym_class_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/gym_classes/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function create_gym_class_has_required_fields()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/gym_classes/store', []);

        $response->assertSessionHasErrors(['name', 'teacher', 'day_time', 'week_days', 'start_at', 'finish_at', 'room']);
    }

    /** @test */
    public function admin_can_create_new_gym_class()
    {
        $this->loginAsAdmin();
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $data = factory(GymClass::class)->raw(['name' => 'John']);

        $response = $this->post('/admin/gym_classes/store', $data);

        $this->assertDatabaseHas(
            'gym_classes',
            [
                'name' => 'John',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('backend_gym_classes.alerts.created')]);
        Event::assertDispatched(GymClassCreated::class);
    }
}
