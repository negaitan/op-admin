<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;

use App\Models\Plan;
use App\Repositories\Backend\PlanRepository;
use App\Http\Requests\Backend\Plan\ManagePlanRequest;
use App\Http\Requests\Backend\Plan\StorePlanRequest;
use App\Http\Requests\Backend\Plan\UpdatePlanRequest;

use App\Events\Backend\Plan\PlanCreated;
use App\Events\Backend\Plan\PlanUpdated;
use App\Events\Backend\Plan\PlanDeleted;

class PlanController extends Controller
{
    /**
     * @var PlanRepository
     */
    protected $planRepository;

    /**
     * PlanController constructor.
     *
     * @param PlanRepository $planRepository
     */
    public function __construct(PlanRepository $planRepository)
    {
        $this->planRepository = $planRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManagePlanRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManagePlanRequest $request)
    {
        return view('backend.plan.index')
            ->withplans($this->planRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManagePlanRequest    $request
     *
     * @return mixed
     */
    public function create(ManagePlanRequest $request)
    {
        return view('backend.plan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePlanRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StorePlanRequest $request)
    {
        $this->planRepository->create($request->only(
            'name',
            'description',
            'price_month',
            'price_matriculation',
            'price_proportional'
        ));

        // Fire create event (PlanCreated)
        event(new PlanCreated($request));

        return redirect()->route('admin.plans.index')
            ->withFlashSuccess(__('backend_plans.alerts.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param ManagePlanRequest  $request
     * @param Plan               $plan
     *
     * @return mixed
     */
    public function show(ManagePlanRequest $request, Plan $plan)
    {
        return view('backend.plan.show')->withPlan($plan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManagePlanRequest $request
     * @param Plan              $plan
     *
     * @return mixed
     */
    public function edit(ManagePlanRequest $request, Plan $plan)
    {
        return view('backend.plan.edit')->withPlan($plan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdatePlanRequest  $request
     * @param Plan               $plan
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        $this->planRepository->update($plan, $request->only(
            'name',
            'description',
            'price_month',
            'price_matriculation',
            'price_proportional'
        ));

        // Fire update event (PlanUpdated)
        event(new PlanUpdated($request));

        return redirect()->route('admin.plans.index')
            ->withFlashSuccess(__('backend_plans.alerts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManagePlanRequest $request
     * @param Plan              $plan
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManagePlanRequest $request, Plan $plan)
    {
        $this->planRepository->deleteById($plan->id);

        // Fire delete event (PlanDeleted)
        event(new PlanDeleted($request));

        return redirect()->route('admin.plans.deleted')
            ->withFlashSuccess(__('alerts.backend.plans.deleted'));
    }

    /**
     * Permanently remove the specified resource from storage.
     *
     * @param ManagePlanRequest $request
     * @param Plan              $deletedPlan
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManagePlanRequest $request, Plan $deletedPlan)
    {
        $this->planRepository->forceDelete($deletedPlan);

        return redirect()->route('admin.plans.deleted')
            ->withFlashSuccess(__('alerts.backend.plans.deleted_permanently'));
    }

    /**
     * @param ManagePlanRequest $request
     * @param Plan              $deletedPlan
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(ManagePlanRequest $request, Plan $deletedPlan)
    {
        $this->planRepository->restore($deletedPlan);

        return redirect()->route('admin.plans.index')
            ->withFlashSuccess(__('exceptions.backend.access.plans.cant_restore'));
    }

    /**
     * Display a listing of deleted items of the resource.
     *
     * @param ManagePlanRequest $request
     *
     * @return mixed
     */
    public function deleted(ManagePlanRequest $request)
    {
        return view('backend.plan.deleted')
            ->withplans($this->planRepository->getDeletedPaginated(25, 'id', 'asc'));
    }
}
