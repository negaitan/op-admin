<?php

namespace Tests\Unit\Backend;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Plan\PlanCreated;
use App\Events\Backend\Plan\PlanUpdated;
use App\Repositories\Backend\PlanRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Plan;

class PlanRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var PlanRepository
     */
    protected $planRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->planRepository = $this->app->make(PlanRepository::class);
    }

    protected function getValidPlanData($planData = [])
    {
        return array_merge([
            'title' => 'Title',
        ], $planData);
    }

    /** @test */
    public function it_can_paginate_the_active_()
    {
        factory(Plan::class, 30)->create();

        $paginatedPlans = $this->planRepository->getActivePaginated(25);

        $this->assertSame(2, $paginatedPlans->lastPage());
        $this->assertSame(25, $paginatedPlans->perPage());
        $this->assertSame(30, $paginatedPlans->total());

        $newPaginatedPlans = $this->planRepository->getActivePaginated(5);

        $this->assertSame(5, $newPaginatedPlans->perPage());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_()
    {
        factory(Plan::class, 30)->create();
        factory(Plan::class, 25)->states('softDeleted')->create();

        $paginatedPlans = $this->planRepository->getDeletedPaginated(10);

        $this->assertSame(3, $paginatedPlans->lastPage());
        $this->assertSame(10, $paginatedPlans->perPage());
        $this->assertSame(25, $paginatedPlans->total());
    }

    /** @test */
    public function it_can_create_new_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertSame(0, Plan::count());

        $this->planRepository->create($this->getValidPlanData());

        $this->assertSame(1, Plan::count());

        Event::assertDispatched(PlanCreated::class);
    }

    /** @test */
    public function it_can_update_existing_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);
        // We need at least one role to create a plan
        $plan = factory(Plan::class)->create();

        $this->planRepository->update($plan, $this->getValidPlanData([
            'title' => 'updated',
        ]));

        $this->assertSame('updated', $plan->fresh()->title);

        Event::assertDispatched(PlanUpdated::class);
    }
}
