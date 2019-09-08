<?php

namespace Tests\Feature\Backend\Plan;

use Tests\TestCase;
use App\Models\Plan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadPlansTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_active_plans_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/plans/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_view_single_plan_page()
    {
        $this->loginAsAdmin();
        $plan = factory(Plan::class)->create();

        $response = $this->get("/admin/plans/{$plan->id}");

        $response->assertStatus(200);
    }
}
