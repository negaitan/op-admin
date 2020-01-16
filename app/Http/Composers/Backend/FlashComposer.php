<?php

namespace App\Http\Composers\Backend;

use Illuminate\View\View;
use App\Repositories\Backend\FlashRepository;

/**
 * Class FlashComposer.
 */
class FlashComposer
{
    /**
     * @var FlashRepository
     */
    protected $flashRepository;

    /**
     * FlashComposer constructor.
     *
     * @param FlashRepository $flashRepository
     */
    public function __construct(FlashRepository $flashRepository)
    {
        $this->flashRepository = $flashRepository;
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        $view->with('flashs', $this->flashRepository->all());
    }
}
