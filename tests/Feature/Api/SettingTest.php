<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SettingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_all_setting_items()
    {
        $response = $this->ajaxGet('/api/settings');

        $response->assertStatus(200);
    }

    /** @test */
    public function api_can_show_only_one_setting()
    {
        $setting = factory(Setting::class)->create();

        $response = $this->ajaxGet("/api/settings/{$setting->id}");

        $response->assertStatus(200);
    }
}
