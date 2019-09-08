<?php

namespace Tests\Feature\Backend\GymClass;

use Tests\TestCase;
use App\Models\GymClass;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\GymClass\GymClassUpdated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateGymClassTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_edit_gym_class_page()
    {
        $this->loginAsAdmin();
        $gym_class = factory(GymClass::class)->create();

        $response = $this->get('/admin/gym_classes/'.$gym_class->id.'/edit');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_gym_class_can_be_updated()
    {
        $this->loginAsAdmin();
        $gym_class = factory(GymClass::class)->create();
        Event::fake();

        $this->assertNotSame('John', $gym_class->title);

        $this->patch("/admin/gym_classes/{$gym_class->id}/update", [
            'title' => 'John',
        ]);

        $this->assertSame('John', $gym_class->fresh()->title);

        Event::assertDispatched(GymClassUpdated::class);
    }
}
