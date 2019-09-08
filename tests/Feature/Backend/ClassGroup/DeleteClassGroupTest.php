<?php

namespace Tests\Feature\Backend\ClassGroup;

use Tests\TestCase;
use App\Models\ClassGroup;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\ClassGroup\ClassGroupRestored;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\ClassGroup\ClassGroupPermanentlyDeleted;

class DeleteClassGroupTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deleted_class_groups_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/class_groups/deleted');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_class_group_must_be_soft_deleted_before_permanently_deleted()
    {
        $this->loginAsAdmin();
        $class_group = factory(ClassGroup::class)->create();

        $response = $this->get("/admin/class_groups/{$class_group->id}/delete");

        $response->assertSessionHas(['flash_danger' => __('backend_class_groups.exceptions.delete_first')]);
    }

    /** @test */
    public function an_admin_can_restore_class_groups()
    {
        $this->loginAsAdmin();
        $class_group = factory(ClassGroup::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/class_groups/{$class_group->id}/restore");
        $response->assertSessionHas(['flash_success' => __('exceptions.backend.access.class_groups.cant_restore')]);

        $this->assertNull($class_group->fresh()->deleted_at);
        Event::assertDispatched(ClassGroupRestored::class);
    }

    /** @test */
    public function a_class_group_can_be_permanently_deleted()
    {
        $this->loginAsAdmin();
        $class_group = factory(ClassGroup::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/class_groups/{$class_group->id}/delete");

        $this->assertNull($class_group->fresh());
        $response->assertSessionHas(['flash_success' => __('alerts.backend.class_groups.deleted_permanently')]);
        Event::assertDispatched(ClassGroupPermanentlyDeleted::class);
    }

    /** @test */
    public function a_not_deleted_class_group_cant_be_restored()
    {
        $this->loginAsAdmin();
        $class_group = factory(ClassGroup::class)->create();

        $response = $this->get("/admin/class_groups/{$class_group->id}/restore");

        $response->assertSessionHas(['flash_danger' => __('backend_class_groups.exceptions.cant_restore')]);
    }

    /** @test */
    public function a_class_group_can_be_deleted()
    {
        $this->loginAsAdmin();
        $class_group = factory(ClassGroup::class)->create();

        $response = $this->delete("/admin/class_groups/{$class_group->id}/destroy");

        $response->assertSessionHas(['flash_success' => __('alerts.backend.class_groups.deleted')]);
        $this->assertDatabaseMissing('class_groups', ['id' => $class_group->id, 'deleted_at' => null]);
    }
}
