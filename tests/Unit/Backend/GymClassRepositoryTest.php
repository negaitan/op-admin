<?php

namespace Tests\Unit\Backend;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\GymClass\GymClassCreated;
use App\Events\Backend\GymClass\GymClassUpdated;
use App\Repositories\Backend\GymClassRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\GymClass;

class GymClassRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var GymClassRepository
     */
    protected $gym_classRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->gym_classRepository = $this->app->make(GymClassRepository::class);
    }

    protected function getValidGymClassData($gym_classData = [])
    {
        return array_merge([
            'title' => 'Title',
        ], $gym_classData);
    }

    /** @test */
    public function it_can_paginate_the_active_()
    {
        factory(GymClass::class, 30)->create();

        $paginatedGymClasss = $this->gym_classRepository->getActivePaginated(25);

        $this->assertSame(2, $paginatedGymClasss->lastPage());
        $this->assertSame(25, $paginatedGymClasss->perPage());
        $this->assertSame(30, $paginatedGymClasss->total());

        $newPaginatedGymClasss = $this->gym_classRepository->getActivePaginated(5);

        $this->assertSame(5, $newPaginatedGymClasss->perPage());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_()
    {
        factory(GymClass::class, 30)->create();
        factory(GymClass::class, 25)->states('softDeleted')->create();

        $paginatedGymClasss = $this->gym_classRepository->getDeletedPaginated(10);

        $this->assertSame(3, $paginatedGymClasss->lastPage());
        $this->assertSame(10, $paginatedGymClasss->perPage());
        $this->assertSame(25, $paginatedGymClasss->total());
    }

    /** @test */
    public function it_can_create_new_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertSame(0, GymClass::count());

        $this->gym_classRepository->create($this->getValidGymClassData());

        $this->assertSame(1, GymClass::count());

        Event::assertDispatched(GymClassCreated::class);
    }

    /** @test */
    public function it_can_update_existing_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);
        // We need at least one role to create a gym_class
        $gym_class = factory(GymClass::class)->create();

        $this->gym_classRepository->update($gym_class, $this->getValidGymClassData([
            'title' => 'updated',
        ]));

        $this->assertSame('updated', $gym_class->fresh()->title);

        Event::assertDispatched(GymClassUpdated::class);
    }
}
