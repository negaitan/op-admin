<?php

namespace Tests\Feature\Backend\Setting;

use Tests\TestCase;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadSettingsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_active_settings_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/settings/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_view_single_setting_page()
    {
        $this->loginAsAdmin();
        $setting = factory(Setting::class)->create();

        $response = $this->get("/admin/settings/{$setting->id}");

        $response->assertStatus(200);
    }
}
