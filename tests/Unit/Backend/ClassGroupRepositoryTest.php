<?php

namespace Tests\Unit\Backend;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\ClassGroup\ClassGroupCreated;
use App\Events\Backend\ClassGroup\ClassGroupUpdated;
use App\Repositories\Backend\ClassGroupRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ClassGroup;

class ClassGroupRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ClassGroupRepository
     */
    protected $class_groupRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->class_groupRepository = $this->app->make(ClassGroupRepository::class);
    }

    protected function getValidClassGroupData($class_groupData = [])
    {
        return array_merge([
            'title' => 'Title',
        ], $class_groupData);
    }

    /** @test */
    public function it_can_paginate_the_active_()
    {
        factory(ClassGroup::class, 30)->create();

        $paginatedClassGroups = $this->class_groupRepository->getActivePaginated(25);

        $this->assertSame(2, $paginatedClassGroups->lastPage());
        $this->assertSame(25, $paginatedClassGroups->perPage());
        $this->assertSame(30, $paginatedClassGroups->total());

        $newPaginatedClassGroups = $this->class_groupRepository->getActivePaginated(5);

        $this->assertSame(5, $newPaginatedClassGroups->perPage());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_()
    {
        factory(ClassGroup::class, 30)->create();
        factory(ClassGroup::class, 25)->states('softDeleted')->create();

        $paginatedClassGroups = $this->class_groupRepository->getDeletedPaginated(10);

        $this->assertSame(3, $paginatedClassGroups->lastPage());
        $this->assertSame(10, $paginatedClassGroups->perPage());
        $this->assertSame(25, $paginatedClassGroups->total());
    }

    /** @test */
    public function it_can_create_new_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertSame(0, ClassGroup::count());

        $this->class_groupRepository->create($this->getValidClassGroupData());

        $this->assertSame(1, ClassGroup::count());

        Event::assertDispatched(ClassGroupCreated::class);
    }

    /** @test */
    public function it_can_update_existing_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);
        // We need at least one role to create a class_group
        $class_group = factory(ClassGroup::class)->create();

        $this->class_groupRepository->update($class_group, $this->getValidClassGroupData([
            'title' => 'updated',
        ]));

        $this->assertSame('updated', $class_group->fresh()->title);

        Event::assertDispatched(ClassGroupUpdated::class);
    }
}
