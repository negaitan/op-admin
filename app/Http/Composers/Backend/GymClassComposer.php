<?php

namespace App\Http\Composers\Backend;

use Illuminate\View\View;
use App\Repositories\Backend\ClubRepository;
use App\Repositories\Backend\ClassNameRepository;

/**
 * Class GymClassComposer.
 */
class GymClassComposer
{
    /**
     * @var ClubRepository
     */
    protected $clubRepository;

    /**
     * GymClassComposer constructor.
     *
     * @param ClubRepository $clubRepository
     */
    public function __construct(ClubRepository $clubRepository, ClassNameRepository $classNameRepository)
    {
        $this->clubRepository = $clubRepository;
        $this->classNameRepository = $classNameRepository;
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        $view->with('clubs', $this->clubRepository->all());
        $view->with('class_names', $this->classNameRepository->all());
        $day_time = ['manana', 'tarde', 'noche'];
        $view->with('day_time', $day_time);
        $week_days = ['lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado', 'domingo'];
        $view->with('week_days', $week_days);
    }
}
