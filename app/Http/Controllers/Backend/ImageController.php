<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exceptions\GeneralException;

use App\Models\Image;
use App\Repositories\Backend\ImageRepository;
use App\Http\Requests\Backend\Image\ManageImageRequest;
use App\Http\Requests\Backend\Image\StoreImageRequest;
use App\Http\Requests\Backend\Image\UpdateImageRequest;

use App\Events\Backend\Image\ImageCreated;
use App\Events\Backend\Image\ImageUpdated;
use App\Events\Backend\Image\ImageDeleted;

class ImageController extends Controller
{
    /**
     * @var ImageRepository
     */
    protected $imageRepository;

    /**
     * ImageController constructor.
     *
     * @param ImageRepository $imageRepository
     */
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ManageImageRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageImageRequest $request)
    {
        return view('backend.image.index')
            ->withimages($this->imageRepository->getActivePaginated(25, 'id', 'asc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageImageRequest    $request
     *
     * @return mixed
     */
    public function create(ManageImageRequest $request)
    {
        return view('backend.image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreImageRequest $request
     *
     * @return mixed
     * @throws \Throwable
     */
    public function store(StoreImageRequest $request)
    {
        $this->imageRepository->create($request->only(
            'title'
        ));

        // Fire create event (ImageCreated)
        event(new ImageCreated($request));

        return redirect()->route('admin.images.index')
            ->withFlashSuccess(__('backend_images.alerts.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param ManageImageRequest  $request
     * @param Image               $image
     *
     * @return mixed
     */
    public function show(ManageImageRequest $request, Image $image)
    {
        return view('backend.image.show')->withImage($image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ManageImageRequest $request
     * @param Image              $image
     *
     * @return mixed
     */
    public function edit(ManageImageRequest $request, Image $image)
    {
        return view('backend.image.edit')->withImage($image);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateImageRequest  $request
     * @param Image               $image
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(UpdateImageRequest $request, Image $image)
    {
        $this->imageRepository->update($image, $request->only(
            'title'
        ));

        // Fire update event (ImageUpdated)
        event(new ImageUpdated($request));

        return redirect()->route('admin.images.index')
            ->withFlashSuccess(__('backend_images.alerts.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManageImageRequest $request
     * @param Image              $image
     *
     * @return mixed
     * @throws \Exception
     */
    public function destroy(ManageImageRequest $request, Image $image)
    {
        $this->imageRepository->deleteById($image->id);

        // Fire delete event (ImageDeleted)
        event(new ImageDeleted($request));

        return redirect()->route('admin.images.deleted')
            ->withFlashSuccess(__('alerts.backend.images.deleted'));
    }

    /**
     * Permanently remove the specified resource from storage.
     *
     * @param ManageImageRequest $request
     * @param Image              $deletedImage
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function delete(ManageImageRequest $request, Image $deletedImage)
    {
        $this->imageRepository->forceDelete($deletedImage);

        return redirect()->route('admin.images.deleted')
            ->withFlashSuccess(__('alerts.backend.images.deleted_permanently'));
    }

    /**
     * @param ManageImageRequest $request
     * @param Image              $deletedImage
     *
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     */
    public function restore(ManageImageRequest $request, Image $deletedImage)
    {
        $this->imageRepository->restore($deletedImage);

        return redirect()->route('admin.images.index')
            ->withFlashSuccess(__('exceptions.backend.access.images.cant_restore'));
    }

    /**
     * Display a listing of deleted items of the resource.
     *
     * @param ManageImageRequest $request
     *
     * @return mixed
     */
    public function deleted(ManageImageRequest $request)
    {
        return view('backend.image.deleted')
            ->withimages($this->imageRepository->getDeletedPaginated(25, 'id', 'asc'));
    }
}
