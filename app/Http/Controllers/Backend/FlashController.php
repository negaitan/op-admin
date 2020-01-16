<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;

use App\Models\Flash;
use App\Repositories\Backend\FlashRepository;
use App\Http\Requests\Backend\Flash\ManageFlashRequest;
use App\Http\Requests\Backend\Flash\StoreFlashRequest;
use App\Http\Requests\Backend\Flash\UpdateFlashRequest;

use App\Events\Backend\Flash\FlashCreated;
use App\Events\Backend\Flash\FlashUpdated;
use App\Events\Backend\Flash\FlashDeleted;

class FlashController extends Controller
{
    /**
     * @var FlashRepository
     */
    protected $flashRepository;

    /**
     * FlashController constructor.
     *
     * @param FlashRepository $flashRepository
     */
    public function __construct(FlashRepository $flashRepository)
    {
        $this->flashRepository = $flashRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManageFlashRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageFlashRequest $request)
    {
        return view('backend.flash.index')
            ->withflashs($this->flashRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageFlashRequest    $request
     *
     * @return mixed
     */
    public function create(ManageFlashRequest $request)
    {
        return view('backend.flash.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFlashRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreFlashRequest $request)
    {
        $this->flashRepository->create($request->only(
            'zona',
            'name_plan',
            'precio_flash',
            'label_flash',
            'precio_especial',
            'label_especial',
            'precio_onSale',
            'label_onSale',
            'precio_regular',
            'label_regular'
        ));

        // Fire create event (FlashCreated)
        event(new FlashCreated($request));

        return redirect()->route('admin.flashs.index')
            ->withFlashSuccess(__('backend_flashs.alerts.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param ManageFlashRequest  $request
     * @param Flash               $flash
     *
     * @return mixed
     */
    public function show(ManageFlashRequest $request, Flash $flash)
    {
        return view('backend.flash.show')->withFlash($flash);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManageFlashRequest $request
     * @param Flash              $flash
     *
     * @return mixed
     */
    public function edit(ManageFlashRequest $request, Flash $flash)
    {
        return view('backend.flash.edit')->withFlash($flash);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFlashRequest  $request
     * @param Flash               $flash
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateFlashRequest $request, Flash $flash)
    {
        $this->flashRepository->update($flash, $request->only(
            'zona',
            'name_plan',
            'precio_flash',
            'label_flash',
            'precio_especial',
            'label_especial',
            'precio_onSale',
            'label_onSale',
            'precio_regular',
            'label_regular'
        ));

        // Fire update event (FlashUpdated)
        event(new FlashUpdated($request));

        return redirect()->route('admin.flashs.index')
            ->withFlashSuccess(__('backend_flashs.alerts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManageFlashRequest $request
     * @param Flash              $flash
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageFlashRequest $request, Flash $flash)
    {
        $this->flashRepository->deleteById($flash->id);

        // Fire delete event (FlashDeleted)
        event(new FlashDeleted($request));

        return redirect()->route('admin.flashs.deleted')
            ->withFlashSuccess(__('backend_flashs.alerts.deleted'));
    }

    /**
     * Permanently remove the specified resource from storage.
     *
     * @param ManageFlashRequest $request
     * @param Flash              $deletedFlash
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageFlashRequest $request, Flash $deletedFlash)
    {
        $this->flashRepository->forceDelete($deletedFlash);

        return redirect()->route('admin.flashs.deleted')
            ->withFlashSuccess(__('backend_flashs.alerts.deleted_permanently'));
    }

    /**
     * @param ManageFlashRequest $request
     * @param Flash              $deletedFlash
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(ManageFlashRequest $request, Flash $deletedFlash)
    {
        $this->flashRepository->restore($deletedFlash);

        return redirect()->route('admin.flashs.index')
            ->withFlashSuccess(__('exceptions.backend.access.flashs.cant_restore'));
    }

    /**
     * Display a listing of deleted items of the resource.
     *
     * @param ManageFlashRequest $request
     *
     * @return mixed
     */
    public function deleted(ManageFlashRequest $request)
    {
        return view('backend.flash.deleted')
            ->withflashs($this->flashRepository->getDeletedPaginated(25, 'id', 'asc'));
    }
}
