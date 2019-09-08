<?php

namespace App\Repositories\Backend;

use App\Models\Club;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Club\ClubCreated;
use App\Events\Backend\Club\ClubUpdated;
use App\Events\Backend\Club\ClubPermanentlyDeleted;
use App\Events\Backend\Club\ClubRestored;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ClubRepository.
 */
class ClubRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Club::class;
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
     * @return Club
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Club
    {
        return DB::transaction(function () use ($data) {
            $club = parent::create([
                'title' => $data['title'],
            ]);

            if ($club) {

                event(new ClubCreated($club));

                return $club;
            }

            throw new GeneralException(__('backend_clubs.exceptions.create_error'));
        });
    }

    /**
     * @param Club  $club
     * @param array     $data
     *
     * @return Club
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Club $club, array $data) : Club
    {
        return DB::transaction(function () use ($club, $data) {
            if ($club->update([
                'title' => $data['title'],
            ])) {
                event(new ClubUpdated($club));

                return $club;
            }

            throw new GeneralException(__('backend_clubs.exceptions.update_error'));
        });
    }

    /**
     * @param Club $club
     *
     * @return Club
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(Club $club) : Club
    {
        if (is_null($club->deleted_at)) {
            throw new GeneralException(__('backend_clubs.exceptions.delete_first'));
        }

        return DB::transaction(function () use ($club) {
            if ($club->forceDelete()) {
                event(new ClubPermanentlyDeleted($club));
                return $club;
            }

            throw new GeneralException(__('backend_clubs.exceptions.delete_error'));
        });
    }

    /**
     * Restore the specified soft deleted resource.
     *
     * @param Club $club
     *
     * @return Club
     * @throws GeneralException
     */
    public function restore(Club $club) : Club
    {
        if (is_null($club->deleted_at)) {
            throw new GeneralException(__('backend_clubs.exceptions.cant_restore'));
        }

        if ($club->restore()) {
            event(new ClubRestored($club));

            return $club;
        }

        throw new GeneralException(__('backend_clubs.exceptions.restore_error'));
    }
}