<?php

namespace App\Http\Composers\Backend;

use Illuminate\View\View;
use App\Repositories\Backend\WebTextRepository;

/**
 * Class WebTextComposer.
 */
class WebTextComposer
{
    /**
     * @var WebTextRepository
     */
    protected $web_textRepository;

    /**
     * WebTextComposer constructor.
     *
     * @param WebTextRepository $web_textRepository
     */
    public function __construct(WebTextRepository $web_textRepository)
    {
        $this->web_textRepository = $web_textRepository;
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        $view->with('texts', $this->web_textRepository->exposed()->get());
    }
}
