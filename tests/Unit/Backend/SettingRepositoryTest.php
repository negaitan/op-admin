<?php

namespace Tests\Unit\Backend;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Setting\SettingCreated;
use App\Events\Backend\Setting\SettingUpdated;
use App\Repositories\Backend\SettingRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Setting;

class SettingRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var SettingRepository
     */
    protected $settingRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->settingRepository = $this->app->make(SettingRepository::class);
    }

    protected function getValidSettingData($settingData = [])
    {
        return array_merge([
            'title' => 'Title',
        ], $settingData);
    }

    /** @test */
    public function it_can_paginate_the_active_()
    {
        factory(Setting::class, 30)->create();

        $paginatedSettings = $this->settingRepository->getActivePaginated(25);

        $this->assertSame(2, $paginatedSettings->lastPage());
        $this->assertSame(25, $paginatedSettings->perPage());
        $this->assertSame(30, $paginatedSettings->total());

        $newPaginatedSettings = $this->settingRepository->getActivePaginated(5);

        $this->assertSame(5, $newPaginatedSettings->perPage());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_()
    {
        factory(Setting::class, 30)->create();
        factory(Setting::class, 25)->states('softDeleted')->create();

        $paginatedSettings = $this->settingRepository->getDeletedPaginated(10);

        $this->assertSame(3, $paginatedSettings->lastPage());
        $this->assertSame(10, $paginatedSettings->perPage());
        $this->assertSame(25, $paginatedSettings->total());
    }

    /** @test */
    public function it_can_create_new_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertSame(0, Setting::count());

        $this->settingRepository->create($this->getValidSettingData());

        $this->assertSame(1, Setting::count());

        Event::assertDispatched(SettingCreated::class);
    }

    /** @test */
    public function it_can_update_existing_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);
        // We need at least one role to create a setting
        $setting = factory(Setting::class)->create();

        $this->settingRepository->update($setting, $this->getValidSettingData([
            'title' => 'updated',
        ]));

        $this->assertSame('updated', $setting->fresh()->title);

        Event::assertDispatched(SettingUpdated::class);
    }
}
