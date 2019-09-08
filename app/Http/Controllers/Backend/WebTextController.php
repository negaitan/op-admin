<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;

use App\Models\WebText;
use App\Repositories\Backend\WebTextRepository;
use App\Http\Requests\Backend\WebText\ManageWebTextRequest;
use App\Http\Requests\Backend\WebText\StoreWebTextRequest;
use App\Http\Requests\Backend\WebText\UpdateWebTextRequest;

use App\Events\Backend\WebText\WebTextCreated;
use App\Events\Backend\WebText\WebTextUpdated;
use App\Events\Backend\WebText\WebTextDeleted;

class WebTextController extends Controller
{
    /**
     * @var WebTextRepository
     */
    protected $web_textRepository;

    /**
     * WebTextController constructor.
     *
     * @param WebTextRepository $web_textRepository
     */
    public function __construct(WebTextRepository $web_textRepository)
    {
        $this->web_textRepository = $web_textRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManageWebTextRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageWebTextRequest $request)
    {
        return view('backend.web_text.index')
            ->withwebTexts($this->web_textRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageWebTextRequest    $request
     *
     * @return mixed
     */
    public function create(ManageWebTextRequest $request)
    {
        return view('backend.web_text.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreWebTextRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreWebTextRequest $request)
    {
        $this->web_textRepository->create($request->only(
            'title'
        ));

        // Fire create event (WebTextCreated)
        event(new WebTextCreated($request));

        return redirect()->route('admin.web_texts.index')
            ->withFlashSuccess(__('backend_web_texts.alerts.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param ManageWebTextRequest  $request
     * @param WebText               $webText
     *
     * @return mixed
     */
    public function show(ManageWebTextRequest $request, WebText $webText)
    {
        return view('backend.web_text.show')->withWebText($webText);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManageWebTextRequest $request
     * @param WebText              $webText
     *
     * @return mixed
     */
    public function edit(ManageWebTextRequest $request, WebText $webText)
    {
        return view('backend.web_text.edit')->withWebText($webText);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateWebTextRequest  $request
     * @param WebText               $webText
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateWebTextRequest $request, WebText $webText)
    {
        $this->web_textRepository->update($webText, $request->only(
            'title'
        ));

        // Fire update event (WebTextUpdated)
        event(new WebTextUpdated($request));

        return redirect()->route('admin.web_texts.index')
            ->withFlashSuccess(__('backend_web_texts.alerts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManageWebTextRequest $request
     * @param WebText              $webText
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageWebTextRequest $request, WebText $webText)
    {
        $this->web_textRepository->deleteById($webText->id);

        // Fire delete event (WebTextDeleted)
        event(new WebTextDeleted($request));

        return redirect()->route('admin.web_texts.deleted')
            ->withFlashSuccess(__('alerts.backend.web_texts.deleted'));
    }

    /**
     * Permanently remove the specified resource from storage.
     *
     * @param ManageWebTextRequest $request
     * @param WebText              $deletedWebText
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageWebTextRequest $request, WebText $deletedWebText)
    {
        $this->web_textRepository->forceDelete($deletedWebText);

        return redirect()->route('admin.web_texts.deleted')
            ->withFlashSuccess(__('alerts.backend.web_texts.deleted_permanently'));
    }

    /**
     * @param ManageWebTextRequest $request
     * @param WebText              $deletedWebText
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(ManageWebTextRequest $request, WebText $deletedWebText)
    {
        $this->web_textRepository->restore($deletedWebText);

        return redirect()->route('admin.web_texts.index')
            ->withFlashSuccess(__('exceptions.backend.access.web_texts.cant_restore'));
    }

    /**
     * Display a listing of deleted items of the resource.
     *
     * @param ManageWebTextRequest $request
     *
     * @return mixed
     */
    public function deleted(ManageWebTextRequest $request)
    {
        return view('backend.web_text.deleted')
            ->withwebTexts($this->web_textRepository->getDeletedPaginated(25, 'id', 'asc'));
    }
}
