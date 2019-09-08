<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;

use App\Models\ClassGroup;
use App\Repositories\Backend\ClassGroupRepository;
use App\Http\Requests\Backend\ClassGroup\ManageClassGroupRequest;
use App\Http\Requests\Backend\ClassGroup\StoreClassGroupRequest;
use App\Http\Requests\Backend\ClassGroup\UpdateClassGroupRequest;

use App\Events\Backend\ClassGroup\ClassGroupCreated;
use App\Events\Backend\ClassGroup\ClassGroupUpdated;
use App\Events\Backend\ClassGroup\ClassGroupDeleted;

class ClassGroupController extends Controller
{
    /**
     * @var ClassGroupRepository
     */
    protected $class_groupRepository;

    /**
     * ClassGroupController constructor.
     *
     * @param ClassGroupRepository $class_groupRepository
     */
    public function __construct(ClassGroupRepository $class_groupRepository)
    {
        $this->class_groupRepository = $class_groupRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManageClassGroupRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageClassGroupRequest $request)
    {
        return view('backend.class_group.index')
            ->withclassGroups($this->class_groupRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageClassGroupRequest    $request
     *
     * @return mixed
     */
    public function create(ManageClassGroupRequest $request)
    {
        return view('backend.class_group.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClassGroupRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreClassGroupRequest $request)
    {
        $this->class_groupRepository->create($request->only(
            'name',
            'logo_image_id',
            'description',
            'cover_image_id',
            'video_url',
            'classes',
            'teacher_image_id',
            'teacher_name',
            'teacher_title',
            'teacher_text',
            'playlist_url'
        ));

        // Fire create event (ClassGroupCreated)
        event(new ClassGroupCreated($request));

        return redirect()->route('admin.class_groups.index')
            ->withFlashSuccess(__('backend_class_groups.alerts.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param ManageClassGroupRequest  $request
     * @param ClassGroup               $classGroup
     *
     * @return mixed
     */
    public function show(ManageClassGroupRequest $request, ClassGroup $classGroup)
    {
        return view('backend.class_group.show')->withClassGroup($classGroup);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManageClassGroupRequest $request
     * @param ClassGroup              $classGroup
     *
     * @return mixed
     */
    public function edit(ManageClassGroupRequest $request, ClassGroup $classGroup)
    {
        return view('backend.class_group.edit')->withClassGroup($classGroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClassGroupRequest  $request
     * @param ClassGroup               $classGroup
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateClassGroupRequest $request, ClassGroup $classGroup)
    {
        $this->class_groupRepository->update($classGroup, $request->only(
            'name',
            'logo_image_id',
            'description',
            'cover_image_id',
            'video_url',
            'classes',
            'teacher_image_id',
            'teacher_name',
            'teacher_title',
            'teacher_text',
            'playlist_url'
        ));

        // Fire update event (ClassGroupUpdated)
        event(new ClassGroupUpdated($request));

        return redirect()->route('admin.class_groups.index')
            ->withFlashSuccess(__('backend_class_groups.alerts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManageClassGroupRequest $request
     * @param ClassGroup              $classGroup
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageClassGroupRequest $request, ClassGroup $classGroup)
    {
        $this->class_groupRepository->deleteById($classGroup->id);

        // Fire delete event (ClassGroupDeleted)
        event(new ClassGroupDeleted($request));

        return redirect()->route('admin.class_groups.deleted')
            ->withFlashSuccess(__('alerts.backend.class_groups.deleted'));
    }

    /**
     * Permanently remove the specified resource from storage.
     *
     * @param ManageClassGroupRequest $request
     * @param ClassGroup              $deletedClassGroup
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageClassGroupRequest $request, ClassGroup $deletedClassGroup)
    {
        $this->class_groupRepository->forceDelete($deletedClassGroup);

        return redirect()->route('admin.class_groups.deleted')
            ->withFlashSuccess(__('alerts.backend.class_groups.deleted_permanently'));
    }

    /**
     * @param ManageClassGroupRequest $request
     * @param ClassGroup              $deletedClassGroup
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(ManageClassGroupRequest $request, ClassGroup $deletedClassGroup)
    {
        $this->class_groupRepository->restore($deletedClassGroup);

        return redirect()->route('admin.class_groups.index')
            ->withFlashSuccess(__('exceptions.backend.access.class_groups.cant_restore'));
    }

    /**
     * Display a listing of deleted items of the resource.
     *
     * @param ManageClassGroupRequest $request
     *
     * @return mixed
     */
    public function deleted(ManageClassGroupRequest $request)
    {
        return view('backend.class_group.deleted')
            ->withclassGroups($this->class_groupRepository->getDeletedPaginated(25, 'id', 'asc'));
    }
}
