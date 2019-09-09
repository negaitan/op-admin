<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;

use App\Models\Amenity;
use App\Repositories\Backend\AmenityRepository;
use App\Http\Requests\Backend\Amenity\ManageAmenityRequest;
use App\Http\Requests\Backend\Amenity\StoreAmenityRequest;
use App\Http\Requests\Backend\Amenity\UpdateAmenityRequest;

use App\Events\Backend\Amenity\AmenityCreated;
use App\Events\Backend\Amenity\AmenityUpdated;
use App\Events\Backend\Amenity\AmenityDeleted;

class AmenityController extends Controller
{
    /**
     * @var AmenityRepository
     */
    protected $amenityRepository;

    /**
     * AmenityController constructor.
     *
     * @param AmenityRepository $amenityRepository
     */
    public function __construct(AmenityRepository $amenityRepository)
    {
        $this->amenityRepository = $amenityRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManageAmenityRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageAmenityRequest $request)
    {
        return view('backend.amenity.index')
            ->withamenities($this->amenityRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageAmenityRequest    $request
     *
     * @return mixed
     */
    public function create(ManageAmenityRequest $request)
    {
        return view('backend.amenity.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAmenityRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreAmenityRequest $request)
    {
        $this->amenityRepository->create($request->only(
            'key', 'value'
        ));

        // Fire create event (AmenityCreated)
        event(new AmenityCreated($request));

        return redirect()->route('admin.amenities.index')
            ->withFlashSuccess(__('backend_amenities.alerts.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param ManageAmenityRequest  $request
     * @param Amenity               $amenity
     *
     * @return mixed
     */
    public function show(ManageAmenityRequest $request, Amenity $amenity)
    {
        return view('backend.amenity.show')->withAmenity($amenity);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManageAmenityRequest $request
     * @param Amenity              $amenity
     *
     * @return mixed
     */
    public function edit(ManageAmenityRequest $request, Amenity $amenity)
    {
        return view('backend.amenity.edit')->withAmenity($amenity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAmenityRequest  $request
     * @param Amenity               $amenity
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateAmenityRequest $request, Amenity $amenity)
    {
        $this->amenityRepository->update($amenity, $request->only(
            'key', 'value'
        ));

        // Fire update event (AmenityUpdated)
        event(new AmenityUpdated($request));

        return redirect()->route('admin.amenities.index')
            ->withFlashSuccess(__('backend_amenities.alerts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManageAmenityRequest $request
     * @param Amenity              $amenity
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageAmenityRequest $request, Amenity $amenity)
    {
        $this->amenityRepository->deleteById($amenity->id);

        // Fire delete event (AmenityDeleted)
        event(new AmenityDeleted($request));

        return redirect()->route('admin.amenities.deleted')
            ->withFlashSuccess(__('alerts.backend.amenities.deleted'));
    }

    /**
     * Permanently remove the specified resource from storage.
     *
     * @param ManageAmenityRequest $request
     * @param Amenity              $deletedAmenity
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageAmenityRequest $request, Amenity $deletedAmenity)
    {
        $this->amenityRepository->forceDelete($deletedAmenity);

        return redirect()->route('admin.amenities.deleted')
            ->withFlashSuccess(__('alerts.backend.amenities.deleted_permanently'));
    }

    /**
     * @param ManageAmenityRequest $request
     * @param Amenity              $deletedAmenity
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(ManageAmenityRequest $request, Amenity $deletedAmenity)
    {
        $this->amenityRepository->restore($deletedAmenity);

        return redirect()->route('admin.amenities.index')
            ->withFlashSuccess(__('exceptions.backend.access.amenities.cant_restore'));
    }

    /**
     * Display a listing of deleted items of the resource.
     *
     * @param ManageAmenityRequest $request
     *
     * @return mixed
     */
    public function deleted(ManageAmenityRequest $request)
    {
        return view('backend.amenity.deleted')
            ->withamenities($this->amenityRepository->getDeletedPaginated(25, 'id', 'asc'));
    }
}
