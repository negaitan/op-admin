<?php

namespace Tests\Feature\Backend\Plan;

use Tests\TestCase;
use App\Models\Plan;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Plan\PlanCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePlanTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_create_plan_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/plans/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function create_plan_has_required_fields()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/plans/store', []);

        $response->assertSessionHasErrors(['title']);
    }

    /** @test */
    public function admin_can_create_new_plan()
    {
        $this->loginAsAdmin();
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $response = $this->post('/admin/plans/store', [
            'title' => 'John',
        ]);

        $this->assertDatabaseHas(
            'plans',
            [
                'title' => 'John',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('backend_plans.alerts.created')]);
        Event::assertDispatched(PlanCreated::class);
    }
}
