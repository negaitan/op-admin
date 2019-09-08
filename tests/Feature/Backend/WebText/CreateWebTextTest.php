<?php

namespace Tests\Feature\Backend\WebText;

use Tests\TestCase;
use App\Models\WebText;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\WebText\WebTextCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateWebTextTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_create_web_text_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/web_texts/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function create_web_text_has_required_fields()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/web_texts/store', []);

        $response->assertSessionHasErrors(['title']);
    }

    /** @test */
    public function admin_can_create_new_web_text()
    {
        $this->loginAsAdmin();
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $response = $this->post('/admin/web_texts/store', [
            'title' => 'John',
        ]);

        $this->assertDatabaseHas(
            'web_texts',
            [
                'title' => 'John',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('backend_web_texts.alerts.created')]);
        Event::assertDispatched(WebTextCreated::class);
    }
}
