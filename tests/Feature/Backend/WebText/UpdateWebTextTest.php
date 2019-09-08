<?php

namespace Tests\Feature\Backend\WebText;

use Tests\TestCase;
use App\Models\WebText;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\WebText\WebTextUpdated;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateWebTextTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_the_edit_web_text_page()
    {
        $this->loginAsAdmin();
        $web_text = factory(WebText::class)->create();

        $response = $this->get('/admin/web_texts/'.$web_text->id.'/edit');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_web_text_can_be_updated()
    {
        $this->loginAsAdmin();
        $web_text = factory(WebText::class)->create();
        Event::fake();

        $this->assertNotSame('John', $web_text->title);

        $this->patch("/admin/web_texts/{$web_text->id}/update", [
            'title' => 'John',
        ]);

        $this->assertSame('John', $web_text->fresh()->title);

        Event::assertDispatched(WebTextUpdated::class);
    }
}
