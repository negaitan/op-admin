<?php

namespace App\Repositories\Backend;

use App\Models\ClassGroup;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\ClassGroup\ClassGroupCreated;
use App\Events\Backend\ClassGroup\ClassGroupUpdated;
use App\Events\Backend\ClassGroup\ClassGroupPermanentlyDeleted;
use App\Events\Backend\ClassGroup\ClassGroupRestored;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ClassGroupRepository.
 */
class ClassGroupRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ClassGroup::class;
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
     * @return ClassGroup
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : ClassGroup
    {
        return DB::transaction(function () use ($data) {
            $class_group = parent::create([
                'title' => $data['title'],
            ]);

            if ($class_group) {

                event(new ClassGroupCreated($class_group));

                return $class_group;
            }

            throw new GeneralException(__('backend_class_groups.exceptions.create_error'));
        });
    }

    /**
     * @param ClassGroup  $class_group
     * @param array     $data
     *
     * @return ClassGroup
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(ClassGroup $class_group, array $data) : ClassGroup
    {
        return DB::transaction(function () use ($class_group, $data) {
            if ($class_group->update([
                'title' => $data['title'],
            ])) {
                event(new ClassGroupUpdated($class_group));

                return $class_group;
            }

            throw new GeneralException(__('backend_class_groups.exceptions.update_error'));
        });
    }

    /**
     * @param ClassGroup $class_group
     *
     * @return ClassGroup
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(ClassGroup $class_group) : ClassGroup
    {
        if (is_null($class_group->deleted_at)) {
            throw new GeneralException(__('backend_class_groups.exceptions.delete_first'));
        }

        return DB::transaction(function () use ($class_group) {
            if ($class_group->forceDelete()) {
                event(new ClassGroupPermanentlyDeleted($class_group));
                return $class_group;
            }

            throw new GeneralException(__('backend_class_groups.exceptions.delete_error'));
        });
    }

    /**
     * Restore the specified soft deleted resource.
     *
     * @param ClassGroup $class_group
     *
     * @return ClassGroup
     * @throws GeneralException
     */
    public function restore(ClassGroup $class_group) : ClassGroup
    {
        if (is_null($class_group->deleted_at)) {
            throw new GeneralException(__('backend_class_groups.exceptions.cant_restore'));
        }

        if ($class_group->restore()) {
            event(new ClassGroupRestored($class_group));

            return $class_group;
        }

        throw new GeneralException(__('backend_class_groups.exceptions.restore_error'));
    }
}
