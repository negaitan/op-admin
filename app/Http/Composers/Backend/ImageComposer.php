<?php

namespace App\Http\Composers\Backend;

use Illuminate\View\View;
use App\Repositories\Backend\ImageRepository;

/**
 * Class ImageComposer.
 */
class ImageComposer
{
    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * ImageComposer constructor.
     *
     * @param ImageRepository $imageRepository
     */
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        $view->with('images', $this->imageRepository->all());
    }
}
