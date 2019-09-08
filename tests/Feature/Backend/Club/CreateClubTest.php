<?php

namespace Tests\Feature\Backend\Club;

use Tests\TestCase;
use App\Models\Club;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Club\ClubCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateClubTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_create_club_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/clubs/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function create_club_has_required_fields()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/clubs/store', []);

        $response->assertSessionHasErrors(['title']);
    }

    /** @test */
    public function admin_can_create_new_club()
    {
        $this->loginAsAdmin();
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $response = $this->post('/admin/clubs/store', [
            'title' => 'John',
        ]);

        $this->assertDatabaseHas(
            'clubs',
            [
                'title' => 'John',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('backend_clubs.alerts.created')]);
        Event::assertDispatched(ClubCreated::class);
    }
}
