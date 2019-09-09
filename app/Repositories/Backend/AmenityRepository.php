<?php

namespace App\Repositories\Backend;

use App\Models\Amenity;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Amenity\AmenityCreated;
use App\Events\Backend\Amenity\AmenityUpdated;
use App\Events\Backend\Amenity\AmenityPermanentlyDeleted;
use App\Events\Backend\Amenity\AmenityRestored;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class AmenityRepository.
 */
class AmenityRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Amenity::class;
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
     * @return Amenity
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Amenity
    {
        return DB::transaction(function () use ($data) {
            $amenity = parent::create([
                'key'   => $data['key'],
                'value' => $data['value'],
            ]);

            if ($amenity) {

                event(new AmenityCreated($amenity));

                return $amenity;
            }

            throw new GeneralException(__('backend_amenities.exceptions.create_error'));
        });
    }

    /**
     * @param Amenity  $amenity
     * @param array     $data
     *
     * @return Amenity
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Amenity $amenity, array $data) : Amenity
    {
        return DB::transaction(function () use ($amenity, $data) {
            if ($amenity->update([
                'key'   => $data['key'],
                'value' => $data['value'],
            ])) {
                event(new AmenityUpdated($amenity));

                return $amenity;
            }

            throw new GeneralException(__('backend_amenities.exceptions.update_error'));
        });
    }

    /**
     * @param Amenity $amenity
     *
     * @return Amenity
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(Amenity $amenity) : Amenity
    {
        if (is_null($amenity->deleted_at)) {
            throw new GeneralException(__('backend_amenities.exceptions.delete_first'));
        }

        return DB::transaction(function () use ($amenity) {
            if ($amenity->forceDelete()) {
                event(new AmenityPermanentlyDeleted($amenity));
                return $amenity;
            }

            throw new GeneralException(__('backend_amenities.exceptions.delete_error'));
        });
    }

    /**
     * Restore the specified soft deleted resource.
     *
     * @param Amenity $amenity
     *
     * @return Amenity
     * @throws GeneralException
     */
    public function restore(Amenity $amenity) : Amenity
    {
        if (is_null($amenity->deleted_at)) {
            throw new GeneralException(__('backend_amenities.exceptions.cant_restore'));
        }

        if ($amenity->restore()) {
            event(new AmenityRestored($amenity));

            return $amenity;
        }

        throw new GeneralException(__('backend_amenities.exceptions.restore_error'));
    }
}
