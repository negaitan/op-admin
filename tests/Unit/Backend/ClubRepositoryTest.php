<?php

namespace Tests\Unit\Backend;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Club\ClubCreated;
use App\Events\Backend\Club\ClubUpdated;
use App\Repositories\Backend\ClubRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Club;

class ClubRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ClubRepository
     */
    protected $clubRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->clubRepository = $this->app->make(ClubRepository::class);
    }

    protected function getValidClubData($clubData = [])
    {
        return array_merge([
            'title' => 'Title',
        ], $clubData);
    }

    /** @test */
    public function it_can_paginate_the_active_()
    {
        factory(Club::class, 30)->create();

        $paginatedClubs = $this->clubRepository->getActivePaginated(25);

        $this->assertSame(2, $paginatedClubs->lastPage());
        $this->assertSame(25, $paginatedClubs->perPage());
        $this->assertSame(30, $paginatedClubs->total());

        $newPaginatedClubs = $this->clubRepository->getActivePaginated(5);

        $this->assertSame(5, $newPaginatedClubs->perPage());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_()
    {
        factory(Club::class, 30)->create();
        factory(Club::class, 25)->states('softDeleted')->create();

        $paginatedClubs = $this->clubRepository->getDeletedPaginated(10);

        $this->assertSame(3, $paginatedClubs->lastPage());
        $this->assertSame(10, $paginatedClubs->perPage());
        $this->assertSame(25, $paginatedClubs->total());
    }

    /** @test */
    public function it_can_create_new_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertSame(0, Club::count());

        $this->clubRepository->create($this->getValidClubData());

        $this->assertSame(1, Club::count());

        Event::assertDispatched(ClubCreated::class);
    }

    /** @test */
    public function it_can_update_existing_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);
        // We need at least one role to create a club
        $club = factory(Club::class)->create();

        $this->clubRepository->update($club, $this->getValidClubData([
            'title' => 'updated',
        ]));

        $this->assertSame('updated', $club->fresh()->title);

        Event::assertDispatched(ClubUpdated::class);
    }
}
