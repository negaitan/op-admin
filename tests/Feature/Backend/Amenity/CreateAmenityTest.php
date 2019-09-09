<?php

namespace Tests\Feature\Backend\Amenity;

use Tests\TestCase;
use App\Models\Amenity;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Amenity\AmenityCreated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateAmenityTest extends TestCase
{
    use RefreshDatabase;

    protected function getValidAmenityData($amenityData = [])
    {
        return array_merge(factory(Amenity::class)->raw(), $amenityData);
    }

    /** @test */
    public function an_admin_can_access_the_create_amenity_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/amenities/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function create_amenity_has_required_fields()
    {
        $this->loginAsAdmin();

        $response = $this->post('/admin/amenities/store', []);

        $response->assertSessionHasErrors(['key', 'value']);
    }

    /** @test */
    public function admin_can_create_new_amenity()
    {
        $this->loginAsAdmin();
        // Hacky workaround for this issue (https://github.com/laravel/framework/issues/18066)
        // Make sure our events are fired
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $response = $this->post('/admin/amenities/store', $this->getValidAmenityData([
            'key' => 'John',
        ]));

        $this->assertDatabaseHas(
            'amenities',
            [
                'key' => 'John',
            ]
        );

        $response->assertSessionHas(['flash_success' => __('backend_amenities.alerts.created')]);
        Event::assertDispatched(AmenityCreated::class);
    }
}
