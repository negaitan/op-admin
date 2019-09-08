<?php

namespace Tests\Feature\Backend\GymClass;

use Tests\TestCase;
use App\Models\GymClass;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadGymClasssTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_active_gym_classes_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/gym_classes/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_view_single_gym_class_page()
    {
        $this->loginAsAdmin();
        $gym_class = factory(GymClass::class)->create();

        $response = $this->get("/admin/gym_classes/{$gym_class->id}");

        $response->assertStatus(200);
    }
}
