<?php

namespace Tests\Feature\Backend\Setting;

use Tests\TestCase;
use App\Models\Setting;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Setting\SettingCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateSettingTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_create_setting_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/settings/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function create_setting_has_required_fields()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/settings/store', []);

        $response->assertSessionHasErrors(['key','value','exposed']);
    }

    /** @test */
    public function admin_can_create_new_setting()
    {
        $this->loginAsAdmin();
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $response = $this->post('/admin/settings/store', [
            'key' => 'John',
            'value' => 'John text',
            'exposed' => true,
        ]);

        $this->assertDatabaseHas(
            'settings',
            [
                'key' => 'John',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('backend_settings.alerts.created')]);
        Event::assertDispatched(SettingCreated::class);
    }
}
