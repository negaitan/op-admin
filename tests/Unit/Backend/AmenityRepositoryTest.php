<?php

namespace Tests\Unit\Backend;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Amenity\AmenityCreated;
use App\Events\Backend\Amenity\AmenityUpdated;
use App\Repositories\Backend\AmenityRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Amenity;

class AmenityRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var AmenityRepository
     */
    protected $amenityRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->amenityRepository = $this->app->make(AmenityRepository::class);
    }

    protected function getValidAmenityData($amenityData = [])
    {
        return array_merge(factory(Amenity::class)->raw(), $amenityData);
    }

    /** @test */
    public function it_can_paginate_the_active_amenities()
    {
        factory(Amenity::class, 30)->create();

        $paginatedAmenitys = $this->amenityRepository->getActivePaginated(25);

        $this->assertSame(2, $paginatedAmenitys->lastPage());
        $this->assertSame(25, $paginatedAmenitys->perPage());
        $this->assertSame(30, $paginatedAmenitys->total());

        $newPaginatedAmenitys = $this->amenityRepository->getActivePaginated(5);

        $this->assertSame(5, $newPaginatedAmenitys->perPage());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_amenities()
    {
        factory(Amenity::class, 30)->create();
        factory(Amenity::class, 25)->states('softDeleted')->create();

        $paginatedAmenitys = $this->amenityRepository->getDeletedPaginated(10);

        $this->assertSame(3, $paginatedAmenitys->lastPage());
        $this->assertSame(10, $paginatedAmenitys->perPage());
        $this->assertSame(25, $paginatedAmenitys->total());
    }

    /** @test */
    public function it_can_create_new_amenities()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertSame(0, Amenity::count());

        $this->amenityRepository->create($this->getValidAmenityData());

        $this->assertSame(1, Amenity::count());

        Event::assertDispatched(AmenityCreated::class);
    }

    /** @test */
    public function it_can_update_existing_amenities()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);
        // We need at least one role to create a amenity
        $amenity = factory(Amenity::class)->create();

        $this->amenityRepository->update($amenity, $this->getValidAmenityData([
            'key' => 'updated',
        ]));

        $this->assertSame('updated', $amenity->fresh()->key);

        Event::assertDispatched(AmenityUpdated::class);
    }
}
