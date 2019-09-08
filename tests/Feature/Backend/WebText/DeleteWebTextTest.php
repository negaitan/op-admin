<?php

namespace Tests\Feature\Backend\WebText;

use Tests\TestCase;
use App\Models\WebText;
use Illuminate\Support\Facades\Event;
use App\Events\Backend\WebText\WebTextRestored;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Events\Backend\WebText\WebTextPermanentlyDeleted;

class DeleteWebTextTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_deleted_web_texts_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/web_texts/deleted');

        $response->assertStatus(200);
    }

    /** @test */
    public function a_web_text_must_be_soft_deleted_before_permanently_deleted()
    {
        $this->loginAsAdmin();
        $web_text = factory(WebText::class)->create();

        $response = $this->get("/admin/web_texts/{$web_text->id}/delete");

        $response->assertSessionHas(['flash_danger' => __('backend_web_texts.exceptions.delete_first')]);
    }

    /** @test */
    public function an_admin_can_restore_web_texts()
    {
        $this->loginAsAdmin();
        $web_text = factory(WebText::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/web_texts/{$web_text->id}/restore");
        $response->assertSessionHas(['flash_success' => __('exceptions.backend.access.web_texts.cant_restore')]);

        $this->assertNull($web_text->fresh()->deleted_at);
        Event::assertDispatched(WebTextRestored::class);
    }

    /** @test */
    public function a_web_text_can_be_permanently_deleted()
    {
        $this->loginAsAdmin();
        $web_text = factory(WebText::class)->states('softDeleted')->create();
        Event::fake();

        $response = $this->get("/admin/web_texts/{$web_text->id}/delete");

        $this->assertNull($web_text->fresh());
        $response->assertSessionHas(['flash_success' => __('alerts.backend.web_texts.deleted_permanently')]);
        Event::assertDispatched(WebTextPermanentlyDeleted::class);
    }

    /** @test */
    public function a_not_deleted_web_text_cant_be_restored()
    {
        $this->loginAsAdmin();
        $web_text = factory(WebText::class)->create();

        $response = $this->get("/admin/web_texts/{$web_text->id}/restore");

        $response->assertSessionHas(['flash_danger' => __('backend_web_texts.exceptions.cant_restore')]);
    }

    /** @test */
    public function a_web_text_can_be_deleted()
    {
        $this->loginAsAdmin();
        $web_text = factory(WebText::class)->create();

        $response = $this->delete("/admin/web_texts/{$web_text->id}/destroy");

        $response->assertSessionHas(['flash_success' => __('alerts.backend.web_texts.deleted')]);
        $this->assertDatabaseMissing('web_texts', ['id' => $web_text->id, 'deleted_at' => null]);
    }
}
