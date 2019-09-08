<?php

namespace Tests\Feature\Backend\Setting;

use Tests\TestCase;
use App\Models\Setting;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Setting\SettingRestored;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\Setting\SettingPermanentlyDeleted;

class DeleteSettingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deleted_settings_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/settings/deleted');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_setting_must_be_soft_deleted_before_permanently_deleted()
    {
        $this->loginAsAdmin();
        $setting = factory(Setting::class)->create();

        $response = $this->get("/admin/settings/{$setting->id}/delete");

        $response->assertSessionHas(['flash_danger' => __('backend_settings.exceptions.delete_first')]);
    }

    /** @test */
    public function an_admin_can_restore_settings()
    {
        $this->loginAsAdmin();
        $setting = factory(Setting::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/settings/{$setting->id}/restore");
        $response->assertSessionHas(['flash_success' => __('exceptions.backend.access.settings.cant_restore')]);

        $this->assertNull($setting->fresh()->deleted_at);
        Event::assertDispatched(SettingRestored::class);
    }

    /** @test */
    public function a_setting_can_be_permanently_deleted()
    {
        $this->loginAsAdmin();
        $setting = factory(Setting::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/settings/{$setting->id}/delete");

        $this->assertNull($setting->fresh());
        $response->assertSessionHas(['flash_success' => __('alerts.backend.settings.deleted_permanently')]);
        Event::assertDispatched(SettingPermanentlyDeleted::class);
    }

    /** @test */
    public function a_not_deleted_setting_cant_be_restored()
    {
        $this->loginAsAdmin();
        $setting = factory(Setting::class)->create();

        $response = $this->get("/admin/settings/{$setting->id}/restore");

        $response->assertSessionHas(['flash_danger' => __('backend_settings.exceptions.cant_restore')]);
    }

    /** @test */
    public function a_setting_can_be_deleted()
    {
        $this->loginAsAdmin();
        $setting = factory(Setting::class)->create();

        $response = $this->delete("/admin/settings/{$setting->id}/destroy");

        $response->assertSessionHas(['flash_success' => __('alerts.backend.settings.deleted')]);
        $this->assertDatabaseMissing('settings', ['id' => $setting->id, 'deleted_at' => null]);
    }
}
