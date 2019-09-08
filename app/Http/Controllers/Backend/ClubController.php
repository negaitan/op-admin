<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;

use App\Models\Club;
use App\Repositories\Backend\ClubRepository;
use App\Http\Requests\Backend\Club\ManageClubRequest;
use App\Http\Requests\Backend\Club\StoreClubRequest;
use App\Http\Requests\Backend\Club\UpdateClubRequest;

use App\Events\Backend\Club\ClubCreated;
use App\Events\Backend\Club\ClubUpdated;
use App\Events\Backend\Club\ClubDeleted;

class ClubController extends Controller
{
    /**
     * @var ClubRepository
     */
    protected $clubRepository;

    /**
     * ClubController constructor.
     *
     * @param ClubRepository $clubRepository
     */
    public function __construct(ClubRepository $clubRepository)
    {
        $this->clubRepository = $clubRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManageClubRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageClubRequest $request)
    {
        return view('backend.club.index')
            ->withclubs($this->clubRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageClubRequest    $request
     *
     * @return mixed
     */
    public function create(ManageClubRequest $request)
    {
        return view('backend.club.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreClubRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreClubRequest $request)
    {
        $this->clubRepository->create($request->only(
            'name',
            'web_text_id',
            'address',
            'opening_time',
            'latitude',
            'longitude',
            'images'
        ));

        // Fire create event (ClubCreated)
        event(new ClubCreated($request));

        return redirect()->route('admin.clubs.index')
            ->withFlashSuccess(__('backend_clubs.alerts.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param ManageClubRequest  $request
     * @param Club               $club
     *
     * @return mixed
     */
    public function show(ManageClubRequest $request, Club $club)
    {
        return view('backend.club.show')->withClub($club);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManageClubRequest $request
     * @param Club              $club
     *
     * @return mixed
     */
    public function edit(ManageClubRequest $request, Club $club)
    {
        $club->load('images');
        return view('backend.club.edit')->withClub($club);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateClubRequest  $request
     * @param Club               $club
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateClubRequest $request, Club $club)
    {
        $this->clubRepository->update($club, $request->only(
            'name',
            'web_text_id',
            'address',
            'opening_time',
            'latitude',
            'longitude',
            'images'
        ));

        // Fire update event (ClubUpdated)
        event(new ClubUpdated($request));

        return redirect()->route('admin.clubs.index')
            ->withFlashSuccess(__('backend_clubs.alerts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManageClubRequest $request
     * @param Club              $club
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageClubRequest $request, Club $club)
    {
        $this->clubRepository->deleteById($club->id);

        // Fire delete event (ClubDeleted)
        event(new ClubDeleted($request));

        return redirect()->route('admin.clubs.deleted')
            ->withFlashSuccess(__('alerts.backend.clubs.deleted'));
    }

    /**
     * Permanently remove the specified resource from storage.
     *
     * @param ManageClubRequest $request
     * @param Club              $deletedClub
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageClubRequest $request, Club $deletedClub)
    {
        $this->clubRepository->forceDelete($deletedClub);

        return redirect()->route('admin.clubs.deleted')
            ->withFlashSuccess(__('alerts.backend.clubs.deleted_permanently'));
    }

    /**
     * @param ManageClubRequest $request
     * @param Club              $deletedClub
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(ManageClubRequest $request, Club $deletedClub)
    {
        $this->clubRepository->restore($deletedClub);

        return redirect()->route('admin.clubs.index')
            ->withFlashSuccess(__('exceptions.backend.access.clubs.cant_restore'));
    }

    /**
     * Display a listing of deleted items of the resource.
     *
     * @param ManageClubRequest $request
     *
     * @return mixed
     */
    public function deleted(ManageClubRequest $request)
    {
        return view('backend.club.deleted')
            ->withclubs($this->clubRepository->getDeletedPaginated(25, 'id', 'asc'));
    }
}
