<?php

namespace Tests\Feature\Backend\Plan;

use Tests\TestCase;
use App\Models\Plan;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Plan\PlanUpdated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdatePlanTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_edit_plan_page()
    {
        $this->loginAsAdmin();
        $plan = factory(Plan::class)->create();

        $response = $this->get('/admin/plans/'.$plan->id.'/edit');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_plan_can_be_updated()
    {
        $this->loginAsAdmin();
        $plan = factory(Plan::class)->create();
        Event::fake();

        $this->assertNotSame('John', $plan->name);

        $data = factory(Plan::class)->raw(['name' => 'John']);

        $this->patch("/admin/plans/{$plan->id}/update", $data);

        $this->assertSame('John', $plan->fresh()->name);

        Event::assertDispatched(PlanUpdated::class);
    }
}
