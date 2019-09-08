<?php

namespace Tests\Feature\Backend\Plan;

use Tests\TestCase;
use App\Models\Plan;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Plan\PlanRestored;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\Plan\PlanPermanentlyDeleted;

class DeletePlanTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deleted_plans_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/plans/deleted');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_plan_must_be_soft_deleted_before_permanently_deleted()
    {
        $this->loginAsAdmin();
        $plan = factory(Plan::class)->create();

        $response = $this->get("/admin/plans/{$plan->id}/delete");

        $response->assertSessionHas(['flash_danger' => __('backend_plans.exceptions.delete_first')]);
    }

    /** @test */
    public function an_admin_can_restore_plans()
    {
        $this->loginAsAdmin();
        $plan = factory(Plan::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/plans/{$plan->id}/restore");
        $response->assertSessionHas(['flash_success' => __('exceptions.backend.access.plans.cant_restore')]);

        $this->assertNull($plan->fresh()->deleted_at);
        Event::assertDispatched(PlanRestored::class);
    }

    /** @test */
    public function a_plan_can_be_permanently_deleted()
    {
        $this->loginAsAdmin();
        $plan = factory(Plan::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/plans/{$plan->id}/delete");

        $this->assertNull($plan->fresh());
        $response->assertSessionHas(['flash_success' => __('alerts.backend.plans.deleted_permanently')]);
        Event::assertDispatched(PlanPermanentlyDeleted::class);
    }

    /** @test */
    public function a_not_deleted_plan_cant_be_restored()
    {
        $this->loginAsAdmin();
        $plan = factory(Plan::class)->create();

        $response = $this->get("/admin/plans/{$plan->id}/restore");

        $response->assertSessionHas(['flash_danger' => __('backend_plans.exceptions.cant_restore')]);
    }

    /** @test */
    public function a_plan_can_be_deleted()
    {
        $this->loginAsAdmin();
        $plan = factory(Plan::class)->create();

        $response = $this->delete("/admin/plans/{$plan->id}/destroy");

        $response->assertSessionHas(['flash_success' => __('alerts.backend.plans.deleted')]);
        $this->assertDatabaseMissing('plans', ['id' => $plan->id, 'deleted_at' => null]);
    }
}
