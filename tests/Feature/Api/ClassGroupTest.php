<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\ClassGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClassGroupTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_all_class_group_items()
    {
        $response = $this->ajaxGet('/api/class_groups');

        $response->assertStatus(200);
    }

    /** @test */
    public function api_can_show_only_one_class_group()
    {
        $class_group = factory(ClassGroup::class)->create();

        $response = $this->ajaxGet("/api/class_groups/{$class_group->id}");

        $response->assertStatus(200);
    }
}
