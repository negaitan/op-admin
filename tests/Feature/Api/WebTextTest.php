<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\WebText;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WebTextTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_all_web_text_items()
    {
        $response = $this->ajaxGet('/api/web_texts');

        $response->assertStatus(200);
    }

    /** @test */
    public function api_can_show_only_one_web_text()
    {
        $web_text = factory(WebText::class)->create();

        $response = $this->ajaxGet("/api/web_texts/{$web_text->id}");

        $response->assertStatus(200);
    }
}
