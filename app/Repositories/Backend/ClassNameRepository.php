<?php

namespace App\Repositories\Backend;

use App\Models\ClassName;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\ClassName\ClassNameCreated;
use App\Events\Backend\ClassName\ClassNameUpdated;
use App\Events\Backend\ClassName\ClassNamePermanentlyDeleted;
use App\Events\Backend\ClassName\ClassNameRestored;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class ClassNameRepository.
 */
class ClassNameRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return ClassName::class;
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
     * @return ClassName
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : ClassName
    {
        return DB::transaction(function () use ($data) {
            $class_name = parent::create([
                'key' => $data['key'],
                'value' => $data['value'],
                'exposed' => $data['exposed'],
            ]);

            if ($class_name) {

                event(new ClassNameCreated($class_name));

                return $class_name;
            }

            throw new GeneralException(__('backend_class_names.exceptions.create_error'));
        });
    }

    /**
     * @param ClassName  $class_name
     * @param array     $data
     *
     * @return ClassName
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(ClassName $class_name, array $data) : ClassName
    {
        return DB::transaction(function () use ($class_name, $data) {
            if ($class_name->update([
                'key' => $data['key'],
                'value' => $data['value'],
                'exposed' => $data['exposed'],
            ])) {
                event(new ClassNameUpdated($class_name));

                return $class_name;
            }

            throw new GeneralException(__('backend_class_names.exceptions.update_error'));
        });
    }

    /**
     * @param ClassName $class_name
     *
     * @return ClassName
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(ClassName $class_name) : ClassName
    {
        if (is_null($class_name->deleted_at)) {
            throw new GeneralException(__('backend_class_names.exceptions.delete_first'));
        }

        return DB::transaction(function () use ($class_name) {
            if ($class_name->forceDelete()) {
                event(new ClassNamePermanentlyDeleted($class_name));
                return $class_name;
            }

            throw new GeneralException(__('backend_class_names.exceptions.delete_error'));
        });
    }

    /**
     * Restore the specified soft deleted resource.
     *
     * @param ClassName $class_name
     *
     * @return ClassName
     * @throws GeneralException
     */
    public function restore(ClassName $class_name) : ClassName
    {
        if (is_null($class_name->deleted_at)) {
            throw new GeneralException(__('backend_class_names.exceptions.cant_restore'));
        }

        if ($class_name->restore()) {
            event(new ClassNameRestored($class_name));

            return $class_name;
        }

        throw new GeneralException(__('backend_class_names.exceptions.restore_error'));
    }
}
