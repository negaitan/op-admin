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
                'title' => $data['title'],
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
                'title' => $data['title'],
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
}
