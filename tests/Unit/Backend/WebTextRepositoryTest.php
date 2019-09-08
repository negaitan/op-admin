<?php

namespace Tests\Unit\Backend;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\WebText\WebTextCreated;
use App\Events\Backend\WebText\WebTextUpdated;
use App\Repositories\Backend\WebTextRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\WebText;

class WebTextRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var WebTextRepository
     */
    protected $web_textRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->web_textRepository = $this->app->make(WebTextRepository::class);
    }

    protected function getValidWebTextData($web_textData = [])
    {
        return array_merge([
            'title' => 'Title',
        ], $web_textData);
    }

    /** @test */
    public function it_can_paginate_the_active_()
    {
        factory(WebText::class, 30)->create();

        $paginatedWebTexts = $this->web_textRepository->getActivePaginated(25);

        $this->assertSame(2, $paginatedWebTexts->lastPage());
        $this->assertSame(25, $paginatedWebTexts->perPage());
        $this->assertSame(30, $paginatedWebTexts->total());

        $newPaginatedWebTexts = $this->web_textRepository->getActivePaginated(5);

        $this->assertSame(5, $newPaginatedWebTexts->perPage());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_()
    {
        factory(WebText::class, 30)->create();
        factory(WebText::class, 25)->states('softDeleted')->create();

        $paginatedWebTexts = $this->web_textRepository->getDeletedPaginated(10);

        $this->assertSame(3, $paginatedWebTexts->lastPage());
        $this->assertSame(10, $paginatedWebTexts->perPage());
        $this->assertSame(25, $paginatedWebTexts->total());
    }

    /** @test */
    public function it_can_create_new_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertSame(0, WebText::count());

        $this->web_textRepository->create($this->getValidWebTextData());

        $this->assertSame(1, WebText::count());

        Event::assertDispatched(WebTextCreated::class);
    }

    /** @test */
    public function it_can_update_existing_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);
        // We need at least one role to create a web_text
        $web_text = factory(WebText::class)->create();

        $this->web_textRepository->update($web_text, $this->getValidWebTextData([
            'title' => 'updated',
        ]));

        $this->assertSame('updated', $web_text->fresh()->title);

        Event::assertDispatched(WebTextUpdated::class);
    }
}
