<?php

namespace App\Http\Composers\Backend;

use Illuminate\View\View;
use App\Repositories\Backend\ClassNameRepository;

/**
 * Class ClassNameComposer.
 */
class ClassNameComposer
{
    /**
     * @var ClassNameRepository
     */
    protected $class_nameRepository;

    /**
     * ClassNameComposer constructor.
     *
     * @param ClassNameRepository $class_nameRepository
     */
    public function __construct(ClassNameRepository $class_nameRepository)
    {
        $this->class_nameRepository = $class_nameRepository;
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        $view->with('texts', $this->class_nameRepository->exposed()->get());
    }
}
