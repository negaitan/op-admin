<?php

namespace App\Http\Composers\Backend;

use Illuminate\View\View;
use App\Repositories\Backend\AmenityRepository;

/**
 * Class AmenityComposer.
 */
class AmenityComposer
{
    /**
     * @var AmenityRepository
     */
    protected $amenityRepository;

    /**
     * AmenityComposer constructor.
     *
     * @param AmenityRepository $amenityRepository
     */
    public function __construct(AmenityRepository $amenityRepository)
    {
        $this->amenityRepository = $amenityRepository;
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        $view->with('amenities', $this->amenityRepository->all());
    }
}
