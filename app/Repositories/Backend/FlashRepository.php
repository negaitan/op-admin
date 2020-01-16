<?php

namespace App\Repositories\Backend;

use App\Models\Flash;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Flash\FlashCreated;
use App\Events\Backend\Flash\FlashUpdated;
use App\Events\Backend\Flash\FlashPermanentlyDeleted;
use App\Events\Backend\Flash\FlashRestored;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class FlashRepository.
 */
class FlashRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Flash::class;
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
     * @return Flash
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Flash
    {
        return DB::transaction(function () use ($data) {
            $flash = parent::create([
                'zona' => $data['zona'],
                'name_plan' => $data['name_plan'],
                'precio_flash' => $data['precio_flash'],
                'label_flash' => $data['label_flash'],
                'precio_especial' => $data['precio_especial'],
                'label_especial' => $data['label_especial'],
                'precio_onSale' => $data['precio_onSale'],
                'label_onSale' => $data['label_onSale'],
                'precio_regular' => $data['precio_regular'],
                'label_regular' => $data['label_regular'],
                ]);

            if ($flash) {

                event(new FlashCreated($flash));

                return $flash;
            }

            throw new GeneralException(__('backend_flashs.exceptions.create_error'));
        });
    }

    /**
     * @param Flash  $flash
     * @param array     $data
     *
     * @return Flash
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Flash $flash, array $data) : Flash
    {
        return DB::transaction(function () use ($flash, $data) {
            if ($flash->update([
                'zona' => $data['zona'],
                'name_plan' => $data['name_plan'],
                'precio_flash' => $data['precio_flash'],
                'label_flash' => $data['label_flash'],
                'precio_especial' => $data['precio_especial'],
                'label_especial' => $data['label_especial'],
                'precio_onSale' => $data['precio_onSale'],
                'label_onSale' => $data['label_onSale'],
                'precio_regular' => $data['precio_regular'],
                'label_regular' => $data['label_regular'],
            ])) {
                event(new FlashUpdated($flash));

                return $flash;
            }

            throw new GeneralException(__('backend_flashs.exceptions.update_error'));
        });
    }

    /**
     * @param Flash $flash
     *
     * @return Flash
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(Flash $flash) : Flash
    {
        if (is_null($flash->deleted_at)) {
            throw new GeneralException(__('backend_flashs.exceptions.delete_first'));
        }

        return DB::transaction(function () use ($flash) {
            if ($flash->forceDelete()) {
                event(new FlashPermanentlyDeleted($flash));
                return $flash;
            }

            throw new GeneralException(__('backend_flashs.exceptions.delete_error'));
        });
    }

    /**
     * Restore the specified soft deleted resource.
     *
     * @param Flash $flash
     *
     * @return Flash
     * @throws GeneralException
     */
    public function restore(Flash $flash) : Flash
    {
        if (is_null($flash->deleted_at)) {
            throw new GeneralException(__('backend_flashs.exceptions.cant_restore'));
        }

        if ($flash->restore()) {
            event(new FlashRestored($flash));

            return $flash;
        }

        throw new GeneralException(__('backend_flashs.exceptions.restore_error'));
    }
}
