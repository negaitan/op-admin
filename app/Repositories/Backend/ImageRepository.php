<?php

namespace App\Repositories\Backend;

use App\Models\Image;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Image\ImageCreated;
use App\Events\Backend\Image\ImageUpdated;
use App\Events\Backend\Image\ImagePermanentlyDeleted;
use App\Events\Backend\Image\ImageRestored;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

/**
 * Class ImageRepository.
 */
class ImageRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Image::class;
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return mixed
     */
    public function getActivePaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param array $data
     *
     * @return Image
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Image
    {
        return DB::transaction(function () use ($data) {
            $image = parent::create([
                'internal_key' => $data['internal_key'],
                'image_type' => $data['image_type'],
                'url' => $data['url'],
                'alt' => $data['alt'],
            ]);

            if ($image) {

                event(new ImageCreated($image));

                return $image;
            }

            throw new GeneralException(__('backend_images.exceptions.create_error'));
        });
    }

    /**
     * @param Image  $image
     * @param array     $data
     *
     * @return Image
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Image $image, array $data) : Image
    {
        return DB::transaction(function () use ($image, $data) {
            if ($image->update([
                'internal_key' => $data['internal_key'],
                'image_type' => $data['image_type'],
                'url' => $data['url'],
                'alt' => $data['alt'],
            ])) {
                event(new ImageUpdated($image));

                return $image;
            }

            throw new GeneralException(__('backend_images.exceptions.update_error'));
        });
    }

    /**
     * @param Image $image
     *
     * @return Image
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(Image $image) : Image
    {

        if (is_null($image->deleted_at)) {
            throw new GeneralException(__('backend_images.exceptions.delete_first'));
        }

        if ($image->image_type == 'storage') {
            $fileName = explode('images/', $image->url);
            $fileName = 'images/' . end($fileName);

            if(Storage::disk('s3')->exists($fileName) ) {
                $this->removeImage($fileName);
            }
        }

        return DB::transaction(function () use ($image) {
            if ($image->forceDelete()) {
                event(new ImagePermanentlyDeleted($image));
                return $image;
            }

            throw new GeneralException(__('backend_images.exceptions.delete_error'));
        });
    }

    /**
     * Restore the specified soft deleted resource.
     *
     * @param Image $image
     *
     * @return Image
     * @throws GeneralException
     */
    public function restore(Image $image) : Image
    {
        if (is_null($image->deleted_at)) {
            throw new GeneralException(__('backend_images.exceptions.cant_restore'));
        }

        if ($image->restore()) {
            event(new ImageRestored($image));

            return $image;
        }

        throw new GeneralException(__('backend_images.exceptions.restore_error'));
    }

    public function processImage($request)
    {
        $this->validate($request, [
            'image' => 'required|image|max:2048'
        ]);

        $file = $request->file('image');
        $name = $file->getClientOriginalName();
        $filePath = 'images/' . $name;

        return $this->uploadImage($filePath, file_get_contents($file));
    }

    /**
     * Upload Image into S3 bucket
     *
     * @param $fileName
     * @param $fileContents
     * @return void
     */
    public function uploadImage($fileName, $fileContents)
    {
        Storage::disk('s3')->put($fileName, $fileContents, 'public');

        return Storage::disk('s3')->url($fileName);
    }

    /**
     * Remove Image from S3 bucket
     *
     * @param $fileName
     * @return void
     */
    public function removeImage($fileName)
    {
        return Storage::disk('s3')->delete($fileName);
    }
}
