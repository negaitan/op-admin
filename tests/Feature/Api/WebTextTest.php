<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\WebText;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WebTextTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function web_texts_endpoint_is_ok()
    {
        $response = $this->ajaxGet('/api/web-texts');

        $response->assertStatus(200);
    }

    /** @test */
    public function web_texts_endpoint_is_unauthenticated_if_is_not_an_ajax_request()
    {
        $response = $this->get('/api/web-texts');

        $response->assertStatus(403);
    }

    /** @test */
    public function it_can_show_all_web_texts_exposed_items_at_web_texts()
    {
        $text_items_exposed = factory(WebText::class)->states('exposed')->create();
        $text_items_unexposed = factory(WebText::class)->states('unexposed')->create();

        $response = $this->ajaxGet('/api/web-texts',[],true);

        $response->assertStatus(200);

        $data = (array)($response->getData()->data[0]);

        $this->assertArrayHasKey('key', $data);
        $this->assertArrayHasKey('value', $data);
        $this->assertArrayHasKey('exposed', $data);

        $this->assertCount(1, $response->getData()->data);
        $this->assertEquals($data['key'], $text_items_exposed->key);
        $this->assertEquals($data['value'], $text_items_exposed->value);
        $this->assertEquals($data['exposed'], $text_items_exposed->exposed);
    }
}
