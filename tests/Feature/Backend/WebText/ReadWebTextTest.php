<?php

namespace Tests\Feature\Backend\WebText;

use Tests\TestCase;
use App\Models\WebText;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadWebTextsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_access_active_web_texts_page()
    {
        $this->loginAsAdmin();

        $response = $this->get('/admin/web_texts/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function an_admin_can_view_single_web_text_page()
    {
        $this->loginAsAdmin();
        $web_text = factory(WebText::class)->create();

        $response = $this->get("/admin/web_texts/{$web_text->id}");

        $response->assertStatus(200);
    }
}
