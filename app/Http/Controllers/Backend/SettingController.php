<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;

use App\Models\Setting;
use App\Repositories\Backend\SettingRepository;
use App\Http\Requests\Backend\Setting\ManageSettingRequest;
use App\Http\Requests\Backend\Setting\StoreSettingRequest;
use App\Http\Requests\Backend\Setting\UpdateSettingRequest;

use App\Events\Backend\Setting\SettingCreated;
use App\Events\Backend\Setting\SettingUpdated;
use App\Events\Backend\Setting\SettingDeleted;

class SettingController extends Controller
{
    /**
     * @var SettingRepository
     */
    protected $settingRepository;

    /**
     * SettingController constructor.
     *
     * @param SettingRepository $settingRepository
     */
    public function __construct(SettingRepository $settingRepository)
    {
        $this->settingRepository = $settingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManageSettingRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageSettingRequest $request)
    {
        return view('backend.setting.index')
            ->withsettings($this->settingRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageSettingRequest    $request
     *
     * @return mixed
     */
    public function create(ManageSettingRequest $request)
    {
        return view('backend.setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSettingRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreSettingRequest $request)
    {
        $this->settingRepository->create($request->only(
            'key',
            'value',
            'exposed'
        ));

        // Fire create event (SettingCreated)
        event(new SettingCreated($request));

        return redirect()->route('admin.settings.index')
            ->withFlashSuccess(__('backend_settings.alerts.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param ManageSettingRequest  $request
     * @param Setting               $setting
     *
     * @return mixed
     */
    public function show(ManageSettingRequest $request, Setting $setting)
    {
        return view('backend.setting.show')->withSetting($setting);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManageSettingRequest $request
     * @param Setting              $setting
     *
     * @return mixed
     */
    public function edit(ManageSettingRequest $request, Setting $setting)
    {
        return view('backend.setting.edit')->withSetting($setting);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSettingRequest  $request
     * @param Setting               $setting
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $this->settingRepository->update($setting, $request->only(
            'key',
            'value',
            'exposed'
        ));

        // Fire update event (SettingUpdated)
        event(new SettingUpdated($request));

        return redirect()->route('admin.settings.index')
            ->withFlashSuccess(__('backend_settings.alerts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManageSettingRequest $request
     * @param Setting              $setting
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageSettingRequest $request, Setting $setting)
    {
        $this->settingRepository->deleteById($setting->id);

        // Fire delete event (SettingDeleted)
        event(new SettingDeleted($request));

        return redirect()->route('admin.settings.deleted')
            ->withFlashSuccess(__('alerts.backend.settings.deleted'));
    }

    /**
     * Permanently remove the specified resource from storage.
     *
     * @param ManageSettingRequest $request
     * @param Setting              $deletedSetting
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageSettingRequest $request, Setting $deletedSetting)
    {
        $this->settingRepository->forceDelete($deletedSetting);

        return redirect()->route('admin.settings.deleted')
            ->withFlashSuccess(__('alerts.backend.settings.deleted_permanently'));
    }

    /**
     * @param ManageSettingRequest $request
     * @param Setting              $deletedSetting
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(ManageSettingRequest $request, Setting $deletedSetting)
    {
        $this->settingRepository->restore($deletedSetting);

        return redirect()->route('admin.settings.index')
            ->withFlashSuccess(__('exceptions.backend.access.settings.cant_restore'));
    }

    /**
     * Display a listing of deleted items of the resource.
     *
     * @param ManageSettingRequest $request
     *
     * @return mixed
     */
    public function deleted(ManageSettingRequest $request)
    {
        return view('backend.setting.deleted')
            ->withsettings($this->settingRepository->getDeletedPaginated(25, 'id', 'asc'));
    }
}
