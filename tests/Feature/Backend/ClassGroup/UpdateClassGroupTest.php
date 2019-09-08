<?php

namespace Tests\Feature\Backend\ClassGroup;

use Tests\TestCase;
use App\Models\ClassGroup;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\ClassGroup\ClassGroupUpdated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateClassGroupTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_edit_class_group_page()
    {
        $this->loginAsAdmin();
        $class_group = factory(ClassGroup::class)->create();

        $response = $this->get('/admin/class_groups/'.$class_group->id.'/edit');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_class_group_can_be_updated()
    {
        $this->loginAsAdmin();
        $class_group = factory(ClassGroup::class)->create();
        Event::fake();

        $this->assertNotSame('John', $class_group->title);

        $this->patch("/admin/class_groups/{$class_group->id}/update", [
            'title' => 'John',
        ]);

        $this->assertSame('John', $class_group->fresh()->title);

        Event::assertDispatched(ClassGroupUpdated::class);
    }
}
