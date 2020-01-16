<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;

use App\Models\GymClass;
use App\Repositories\Backend\GymClassRepository;
use App\Http\Requests\Backend\GymClass\ManageGymClassRequest;
use App\Http\Requests\Backend\GymClass\StoreGymClassRequest;
use App\Http\Requests\Backend\GymClass\UpdateGymClassRequest;

use App\Events\Backend\GymClass\GymClassCreated;
use App\Events\Backend\GymClass\GymClassUpdated;
use App\Events\Backend\GymClass\GymClassDeleted;

class GymClassController extends Controller
{
    /**
     * @var GymClassRepository
     */
    protected $gym_classRepository;

    /**
     * GymClassController constructor.
     *
     * @param GymClassRepository $gym_classRepository
     */
    public function __construct(GymClassRepository $gym_classRepository)
    {
        $this->gym_classRepository = $gym_classRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManageGymClassRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageGymClassRequest $request)
    {
        return view('backend.gym_class.index')
            ->withgymClasses($this->gym_classRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageGymClassRequest    $request
     *
     * @return mixed
     */
    public function create(ManageGymClassRequest $request)
    {
        return view('backend.gym_class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGymClassRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreGymClassRequest $request)
    {
        $this->gym_classRepository->create($request->only(
            'club_id', 'class_name_id', 'teacher', 'day_time', 'week_days', 'start_at', 'finish_at', 'room'
        ));

        // Fire create event (GymClassCreated)
        event(new GymClassCreated($request));

        return redirect()->route('admin.gym_classes.index')
            ->withFlashSuccess(__('backend_gym_classes.alerts.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param ManageGymClassRequest  $request
     * @param GymClass               $gymClass
     *
     * @return mixed
     */
    public function show(ManageGymClassRequest $request, GymClass $gymClass)
    {
        return view('backend.gym_class.show')->withGymClass($gymClass);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManageGymClassRequest $request
     * @param GymClass              $gymClass
     *
     * @return mixed
     */
    public function edit(ManageGymClassRequest $request, GymClass $gymClass)
    {
        return view('backend.gym_class.edit')->withGymClass($gymClass);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateGymClassRequest  $request
     * @param GymClass               $gymClass
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateGymClassRequest $request, GymClass $gymClass)
    {
        $this->gym_classRepository->update($gymClass, $request->only(
            'club_id', 'class_name_id', 'teacher', 'day_time', 'week_days', 'start_at', 'finish_at', 'room'
        ));

        // Fire update event (GymClassUpdated)
        event(new GymClassUpdated($request));

        return redirect()->route('admin.gym_classes.index')
            ->withFlashSuccess(__('backend_gym_classes.alerts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManageGymClassRequest $request
     * @param GymClass              $gymClass
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageGymClassRequest $request, GymClass $gymClass)
    {
        $this->gym_classRepository->deleteById($gymClass->id);

        // Fire delete event (GymClassDeleted)
        event(new GymClassDeleted($request));

        return redirect()->route('admin.gym_classes.deleted')
            ->withFlashSuccess(__('alerts.backend.gym_classes.deleted'));
    }

    /**
     * Permanently remove the specified resource from storage.
     *
     * @param ManageGymClassRequest $request
     * @param GymClass              $deletedGymClass
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageGymClassRequest $request, GymClass $deletedGymClass)
    {
        $this->gym_classRepository->forceDelete($deletedGymClass);

        return redirect()->route('admin.gym_classes.deleted')
            ->withFlashSuccess(__('alerts.backend.gym_classes.deleted_permanently'));
    }

    /**
     * @param ManageGymClassRequest $request
     * @param GymClass              $deletedGymClass
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(ManageGymClassRequest $request, GymClass $deletedGymClass)
    {
        $this->gym_classRepository->restore($deletedGymClass);

        return redirect()->route('admin.gym_classes.index')
            ->withFlashSuccess(__('exceptions.backend.access.gym_classes.cant_restore'));
    }

    /**
     * Display a listing of deleted items of the resource.
     *
     * @param ManageGymClassRequest $request
     *
     * @return mixed
     */
    public function deleted(ManageGymClassRequest $request)
    {
        return view('backend.gym_class.deleted')
            ->withgymClasses($this->gym_classRepository->getDeletedPaginated(25, 'id', 'asc'));
    }
}
