<?php

namespace Tests\Unit\Backend;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Eloquent\Model;
use App\Events\Backend\Image\ImageCreated;
use App\Events\Backend\Image\ImageUpdated;
use App\Repositories\Backend\ImageRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Image;

class ImageRepositoryTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    protected function setUp() : void
    {
        parent::setUp();

        $this->imageRepository = $this->app->make(ImageRepository::class);
    }

    protected function getValidImageData($imageData = [])
    {
        return array_merge([
            'title' => 'Title',
        ], $imageData);
    }

    /** @test */
    public function it_can_paginate_the_active_()
    {
        factory(Image::class, 30)->create();

        $paginatedImages = $this->imageRepository->getActivePaginated(25);

        $this->assertSame(2, $paginatedImages->lastPage());
        $this->assertSame(25, $paginatedImages->perPage());
        $this->assertSame(30, $paginatedImages->total());

        $newPaginatedImages = $this->imageRepository->getActivePaginated(5);

        $this->assertSame(5, $newPaginatedImages->perPage());
    }

    /** @test */
    public function it_can_paginate_the_soft_deleted_()
    {
        factory(Image::class, 30)->create();
        factory(Image::class, 25)->states('softDeleted')->create();

        $paginatedImages = $this->imageRepository->getDeletedPaginated(10);

        $this->assertSame(3, $paginatedImages->lastPage());
        $this->assertSame(10, $paginatedImages->perPage());
        $this->assertSame(25, $paginatedImages->total());
    }

    /** @test */
    public function it_can_create_new_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);

        $this->assertSame(0, Image::count());

        $this->imageRepository->create($this->getValidImageData());

        $this->assertSame(1, Image::count());

        Event::assertDispatched(ImageCreated::class);
    }

    /** @test */
    public function it_can_update_existing_()
    {
        $initialDispatcher = Event::getFacadeRoot();
        Event::fake();
        Model::setEventDispatcher($initialDispatcher);
        // We need at least one role to create a image
        $image = factory(Image::class)->create();

        $this->imageRepository->update($image, $this->getValidImageData([
            'title' => 'updated',
        ]));

        $this->assertSame('updated', $image->fresh()->title);

        Event::assertDispatched(ImageUpdated::class);
    }
}
