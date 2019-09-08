<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Plan;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PlanTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_all_plan_items()
    {
        $response = $this->ajaxGet('/api/plans');

        $response->assertStatus(200);
    }

    /** @test */
    public function api_can_show_only_one_plan()
    {
        $plan = factory(Plan::class)->create();

        $response = $this->ajaxGet("/api/plans/{$plan->id}");

        $response->assertStatus(200);
    }
}
