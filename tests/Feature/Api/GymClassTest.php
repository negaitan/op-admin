<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\GymClass;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Club;

class GymClassTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_all_gym_class_items()
    {
        $class_names = [
            'class 1',
            'class 2',
            'class 3',
        ];

        foreach($class_names as $class_name) {
            factory(GymClass::class)->create(['name' => $class_name]);
        }

        $response = $this->ajaxGet('/api/gym_classes');

        $response->assertStatus(200);
        foreach($class_names as $class_name) {
            $response->assertSee($class_name);
        }
    }

    /** @test */
    public function it_can_show_all_gym_class_items_by_club()
    {
        $club = factory(Club::class)->create();

        factory(GymClass::class, 10)->create();
        factory(GymClass::class, 10)->create(['club_id' => $club->id]);

        $response = $this->ajaxGet('/api/gym_classes?club=' . $club->id);
        // $response = $this->ajaxGet('/api/gym_classes?club=21&day=domingo');

        $this->assertCount(10, $response->decodeResponseJson()['data']);
    }

    /** @test */
    public function it_can_show_all_gym_class_items_by_day()
    {
        factory(GymClass::class, 10)->create(['week_days' => ['sabado']]);
        factory(GymClass::class, 10)->create(['week_days' => ['domingo']]);

        $response = $this->ajaxGet("/api/gym_classes?day=domingo");

        $this->assertCount(10, $response->decodeResponseJson()['data']);
    }

    /** @test */
    public function it_can_show_all_gym_class_items_by_club_and_day()
    {
        $club = factory(Club::class)->create();

        $expected_weekday = 'domingo';

        factory(GymClass::class, 10)->create(['week_days' => ['sabado']]);
        factory(GymClass::class, 10)->create(['week_days' => [$expected_weekday]]);
        factory(GymClass::class, 10)->create(['club_id' => $club->id, 'week_days' => ['sabado']]);

        $response = $this->ajaxGet("/api/gym_classes?club=$club->id&day=$expected_weekday");

        $this->assertCount(20, $response->decodeResponseJson()['data']);
    }

    /** @test */
    public function api_can_show_only_one_gym_class()
    {
        $this->withoutExceptionHandling();
        $gym_class = factory(GymClass::class)->create();

        $response = $this->ajaxGet("/api/gym_classes/{$gym_class->id}");

        $response->assertStatus(200);
    }
}
