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

        $this->assertNotSame('John', $setting->title);

        $this->patch("/admin/settings/{$setting->id}/update", [
            'title' => 'John',
        ]);

        $this->assertSame('John', $setting->fresh()->title);

        Event::assertDispatched(SettingUpdated::class);
    }
}
