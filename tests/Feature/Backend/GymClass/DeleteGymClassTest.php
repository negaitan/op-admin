<?php

namespace Tests\Feature\Backend\GymClass;

use Tests\TestCase;
use App\Models\GymClass;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\GymClass\GymClassRestored;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\GymClass\GymClassPermanentlyDeleted;

class DeleteGymClassTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deleted_gym_classes_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/gym_classes/deleted');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_gym_class_must_be_soft_deleted_before_permanently_deleted()
    {
        $this->loginAsAdmin();
        $gym_class = factory(GymClass::class)->create();

        $response = $this->get("/admin/gym_classes/{$gym_class->id}/delete");

        $response->assertSessionHas(['flash_danger' => __('backend_gym_classes.exceptions.delete_first')]);
    }

    /** @test */
    public function an_admin_can_restore_gym_classes()
    {
        $this->loginAsAdmin();
        $gym_class = factory(GymClass::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/gym_classes/{$gym_class->id}/restore");
        $response->assertSessionHas(['flash_success' => __('exceptions.backend.access.gym_classes.cant_restore')]);

        $this->assertNull($gym_class->fresh()->deleted_at);
        Event::assertDispatched(GymClassRestored::class);
    }

    /** @test */
    public function a_gym_class_can_be_permanently_deleted()
    {
        $this->loginAsAdmin();
        $gym_class = factory(GymClass::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/gym_classes/{$gym_class->id}/delete");

        $this->assertNull($gym_class->fresh());
        $response->assertSessionHas(['flash_success' => __('alerts.backend.gym_classes.deleted_permanently')]);
        Event::assertDispatched(GymClassPermanentlyDeleted::class);
    }

    /** @test */
    public function a_not_deleted_gym_class_cant_be_restored()
    {
        $this->loginAsAdmin();
        $gym_class = factory(GymClass::class)->create();

        $response = $this->get("/admin/gym_classes/{$gym_class->id}/restore");

        $response->assertSessionHas(['flash_danger' => __('backend_gym_classes.exceptions.cant_restore')]);
    }

    /** @test */
    public function a_gym_class_can_be_deleted()
    {
        $this->loginAsAdmin();
        $gym_class = factory(GymClass::class)->create();

        $response = $this->delete("/admin/gym_classes/{$gym_class->id}/destroy");

        $response->assertSessionHas(['flash_success' => __('alerts.backend.gym_classes.deleted')]);
        $this->assertDatabaseMissing('gym_classes', ['id' => $gym_class->id, 'deleted_at' => null]);
    }
}
