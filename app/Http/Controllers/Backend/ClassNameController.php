<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;

use App\Models\ClassName;
use App\Repositories\Backend\ClassNameRepository;
use App\Http\Requests\Backend\ClassName\ManageClassNameRequest;
use App\Http\Requests\Backend\ClassName\StoreClassNameRequest;
use App\Http\Requests\Backend\ClassName\UpdateClassNameRequest;

use App\Events\Backend\ClassName\ClassNameCreated;
use App\Events\Backend\ClassName\ClassNameUpdated;
use App\Events\Backend\ClassName\ClassNameDeleted;

class ClassNameController extends Controller
{
    /**
     * @var ClassNameRepository
     */
    protected $class_nameRepository;

    /**
     * ClassNameController constructor.
     *
     * @param ClassNameRepository $class_nameRepository
     */
    public function __construct(ClassNameRepository $class_nameRepository)
    {
        $this->class_nameRepository = $class_nameRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManageClassNameRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageClassNameRequest $request)
    {
        return view('backend.class_name.index')
            ->withclassNames($this->class_nameRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageClassNameRequest    $request
     *
     * @return mixed
     */
    public function create(ManageClassNameRequest $request)
    {
        return view('backend.class_name.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClassNameRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreClassNameRequest $request)
    {
        $this->class_nameRepository->create($request->only(
            'key',
            'value',
            'exposed'
        ));

        // Fire create event (ClassNameCreated)
        event(new ClassNameCreated($request));

        return redirect()->route('admin.class_names.index')
            ->withFlashSuccess(__('backend_class_names.alerts.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param ManageClassNameRequest  $request
     * @param ClassName               $className
     *
     * @return mixed
     */
    public function show(ManageClassNameRequest $request, ClassName $className)
    {
        return view('backend.class_name.show')->withClassName($className);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManageClassNameRequest $request
     * @param ClassName              $className
     *
     * @return mixed
     */
    public function edit(ManageClassNameRequest $request, ClassName $className)
    {
        return view('backend.class_name.edit')->withClassName($className);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClassNameRequest  $request
     * @param ClassName               $className
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateClassNameRequest $request, ClassName $className)
    {
        $this->class_nameRepository->update($className, $request->only(
            'key',
            'value',
            'exposed'
        ));

        // Fire update event (ClassNameUpdated)
        event(new ClassNameUpdated($request));

        return redirect()->route('admin.class_names.index')
            ->withFlashSuccess(__('backend_class_names.alerts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManageClassNameRequest $request
     * @param ClassName              $className
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageClassNameRequest $request, ClassName $className)
    {
        $this->class_nameRepository->deleteById($className->id);

        // Fire delete event (ClassNameDeleted)
        event(new ClassNameDeleted($request));

        return redirect()->route('admin.class_names.deleted')
            ->withFlashSuccess(__('alerts.backend.class_names.deleted'));
    }

    /**
     * Permanently remove the specified resource from storage.
     *
     * @param ManageClassNameRequest $request
     * @param ClassName              $deletedClassName
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageClassNameRequest $request, ClassName $deletedClassName)
    {
        $this->class_nameRepository->forceDelete($deletedClassName);

        return redirect()->route('admin.class_names.deleted')
            ->withFlashSuccess(__('alerts.backend.class_names.deleted_permanently'));
    }

    /**
     * @param ManageClassNameRequest $request
     * @param ClassName              $deletedClassName
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(ManageClassNameRequest $request, ClassName $deletedClassName)
    {
        $this->class_nameRepository->restore($deletedClassName);

        return redirect()->route('admin.class_names.index')
            ->withFlashSuccess(__('exceptions.backend.access.class_names.cant_restore'));
    }

    /**
     * Display a listing of deleted items of the resource.
     *
     * @param ManageClassNameRequest $request
     *
     * @return mixed
     */
    public function deleted(ManageClassNameRequest $request)
    {
        return view('backend.class_name.deleted')
            ->withclassNames($this->class_nameRepository->getDeletedPaginated(25, 'id', 'asc'));
    }
}
