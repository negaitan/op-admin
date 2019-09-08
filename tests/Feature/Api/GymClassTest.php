<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\GymClass;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GymClassTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_all_gym_class_items()
    {
        $response = $this->ajaxGet('/api/gym_classes');

        $response->assertStatus(200);
    }

    /** @test */
    public function api_can_show_only_one_gym_class()
    {
        $gym_class = factory(GymClass::class)->create();

        $response = $this->ajaxGet("/api/gym_classes/{$gym_class->id}");

        $response->assertStatus(200);
    }
}
