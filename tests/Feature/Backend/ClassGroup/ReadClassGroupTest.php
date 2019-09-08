<?php

namespace Tests\Feature\Backend\ClassGroup;

use Tests\TestCase;
use App\Models\ClassGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadClassGroupsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_active_class_groups_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/class_groups/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_view_single_class_group_page()
    {
        $this->loginAsAdmin();
        $class_group = factory(ClassGroup::class)->create();

        $response = $this->get("/admin/class_groups/{$class_group->id}");

        $response->assertStatus(200);
    }
}
