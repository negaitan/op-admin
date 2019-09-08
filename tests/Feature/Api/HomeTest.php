<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Setting;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomeTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function home_endpoint_is_ok()
    {
        $response = $this->ajaxGet('/api/home');

        $response->assertStatus(200);
    }

    /** @test */
    public function home_endpoint_is_unauthenticated_if_is_not_an_ajax_request()
    {
        $response = $this->get('/api/home');

        $response->assertStatus(403);
    }

    /** @test */
    public function it_can_show_all_setting_exposed_items_at_home()
    {
        $setting_exposed = factory(Setting::class)->states('exposed')->create();
        $setting_unexposed = factory(Setting::class)->states('unexposed')->create();

        $response = $this->ajaxGet('/api/home',[],true);

        $response->assertStatus(200);

        $data = (array)($response->getData()->data[0]);

        $this->assertArrayHasKey('key', $data);
        $this->assertArrayHasKey('value', $data);
        $this->assertArrayHasKey('exposed', $data);

        $this->assertCount(1, $response->getData()->data);
        $this->assertEquals($data['key'], $setting_exposed->key);
        $this->assertEquals($data['value'], $setting_exposed->value);
        $this->assertEquals($data['exposed'], $setting_exposed->exposed);
    }
}
