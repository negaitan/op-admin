<?php

namespace Tests\Feature\Backend\Setting;

use Tests\TestCase;
use App\Models\Setting;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\Setting\SettingUpdated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateSettingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_edit_setting_page()
    {
        $this->loginAsAdmin();
        $setting = factory(Setting::class)->create();

        $response = $this->get('/admin/settings/'.$setting->id.'/edit');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_setting_can_be_updated()
    {
        $this->loginAsAdmin();
        $setting = factory(Setting::class)->create();
        Event::fake();

        $this->assertNotSame('John', $setting->key);

        $this->patch("/admin/settings/{$setting->id}/update", [
            'key' => 'John',
            'value' => 'John text',
            'exposed' => true,
        ]);

        $this->assertSame('John', $setting->fresh()->key);

        Event::assertDispatched(SettingUpdated::class);
    }

    /** @test */
    public function a_setting_cant_be_updated_if_key_is_already_taken()
    {
        $this->loginAsAdmin();
        $settingA = factory(Setting::class)->create(['key' => 'John']);
        $setting = factory(Setting::class)->create();
        Event::fake();

        $this->assertNotSame($settingA->key, $setting->key);

        $response = $this->patch("/admin/settings/{$setting->id}/update", [
            'key' => 'John',
            'value' => 'John text',
            'exposed' => true,
        ]);
        $response->assertRedirect();
        $response->assertSessionHasErrors();

        Event::assertNotDispatched(SettingUpdated::class);
    }
}
