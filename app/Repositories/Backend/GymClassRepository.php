<?php

namespace App\Repositories\Backend;

use App\Models\GymClass;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\GymClass\GymClassCreated;
use App\Events\Backend\GymClass\GymClassUpdated;
use App\Events\Backend\GymClass\GymClassPermanentlyDeleted;
use App\Events\Backend\GymClass\GymClassRestored;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class GymClassRepository.
 */
class GymClassRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return GymClass::class;
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
            ->with('club')
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
            ->with('club')
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param array $data
     *
     * @return GymClass
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : GymClass
    {
        return DB::transaction(function () use ($data) {
            $gym_class = parent::create([
                'club_id'   => $data['club_id'],
                'name'      => $data['name'],
                'teacher'   => $data['teacher'],
                'day_time'  => $data['day_time'],
                'week_days' => $data['week_days'],
                'start_at'  => $data['start_at'],
                'finish_at' => $data['finish_at'],
                'room'      => $data['room'],
            ]);

            if ($gym_class) {

                event(new GymClassCreated($gym_class));

                return $gym_class;
            }

            throw new GeneralException(__('backend_gym_classes.exceptions.create_error'));
        });
    }

    /**
     * @param GymClass  $gym_class
     * @param array     $data
     *
     * @return GymClass
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(GymClass $gym_class, array $data) : GymClass
    {
        return DB::transaction(function () use ($gym_class, $data) {
            if ($gym_class->update([
                'club_id'   => $data['club_id'],
                'name'      => $data['name'],
                'teacher'   => $data['teacher'],
                'day_time'  => $data['day_time'],
                'week_days' => $data['week_days'],
                'start_at'  => $data['start_at'],
                'finish_at' => $data['finish_at'],
                'room'      => $data['room'],
            ])) {
                event(new GymClassUpdated($gym_class));

                return $gym_class;
            }

            throw new GeneralException(__('backend_gym_classes.exceptions.update_error'));
        });
    }

    /**
     * @param GymClass $gym_class
     *
     * @return GymClass
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(GymClass $gym_class) : GymClass
    {
        if (is_null($gym_class->deleted_at)) {
            throw new GeneralException(__('backend_gym_classes.exceptions.delete_first'));
        }

        return DB::transaction(function () use ($gym_class) {
            if ($gym_class->forceDelete()) {
                event(new GymClassPermanentlyDeleted($gym_class));
                return $gym_class;
            }

            throw new GeneralException(__('backend_gym_classes.exceptions.delete_error'));
        });
    }

    /**
     * Restore the specified soft deleted resource.
     *
     * @param GymClass $gym_class
     *
     * @return GymClass
     * @throws GeneralException
     */
    public function restore(GymClass $gym_class) : GymClass
    {
        if (is_null($gym_class->deleted_at)) {
            throw new GeneralException(__('backend_gym_classes.exceptions.cant_restore'));
        }

        if ($gym_class->restore()) {
            event(new GymClassRestored($gym_class));

            return $gym_class;
        }

        throw new GeneralException(__('backend_gym_classes.exceptions.restore_error'));
    }
}
