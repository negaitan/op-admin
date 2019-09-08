<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\ClassGroup;
use App\Models\Image;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClassGroupModelTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_has_only_one_logoImage()
    {
        $club = factory(ClassGroup::class)->create();

        $club->logoImage()->create(factory(Image::class)->raw());

        $this->assertInstanceOf(Image::class, $club->logoImage);
    }

    /** @test */
    public function it_has_only_one_coverImage()
    {
        $club = factory(ClassGroup::class)->create();

        $club->coverImage()->create(factory(Image::class)->raw());

        $this->assertInstanceOf(Image::class, $club->coverImage);
    }

    /** @test */
    public function it_has_only_one_teacherImage()
    {
        $club = factory(ClassGroup::class)->create();

        $club->teacherImage()->create(factory(Image::class)->raw());

        $this->assertInstanceOf(Image::class, $club->teacherImage);
    }
}
