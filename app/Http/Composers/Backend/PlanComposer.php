<?php

namespace App\Http\Composers\Backend;

use Illuminate\View\View;
use App\Repositories\Backend\PlanRepository;

/**
 * Class PlanComposer.
 */
class PlanComposer
{
    /**
     * @var PlanRepository
     */
    protected $planRepository;

    /**
     * PlanComposer constructor.
     *
     * @param PlanRepository $planRepository
     */
    public function __construct(PlanRepository $planRepository)
    {
        $this->planRepository = $planRepository;
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        $view->with('plans', $this->planRepository->all());
    }
}
