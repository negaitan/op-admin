<?php

namespace App\Repositories\Backend;

use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Setting\SettingCreated;
use App\Events\Backend\Setting\SettingUpdated;
use App\Events\Backend\Setting\SettingPermanentlyDeleted;
use App\Events\Backend\Setting\SettingRestored;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class SettingRepository.
 */
class SettingRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Setting::class;
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
     * @return Setting
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Setting
    {
        return DB::transaction(function () use ($data) {
            $setting = parent::create([
                'key' => $data['key'],
                'value' => $data['value'],
                'exposed' => $data['exposed'],
            ]);

            if ($setting) {

                event(new SettingCreated($setting));

                return $setting;
            }

            throw new GeneralException(__('backend_settings.exceptions.create_error'));
        });
    }

    /**
     * @param Setting  $setting
     * @param array     $data
     *
     * @return Setting
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Setting $setting, array $data) : Setting
    {
        return DB::transaction(function () use ($setting, $data) {
            if ($setting->update([
                'key' => $data['key'],
                'value' => $data['value'],
                'exposed' => $data['exposed'],
            ])) {
                event(new SettingUpdated($setting));

                return $setting;
            }

            throw new GeneralException(__('backend_settings.exceptions.update_error'));
        });
    }

    /**
     * @param Setting $setting
     *
     * @return Setting
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(Setting $setting) : Setting
    {
        if (is_null($setting->deleted_at)) {
            throw new GeneralException(__('backend_settings.exceptions.delete_first'));
        }

        return DB::transaction(function () use ($setting) {
            if ($setting->forceDelete()) {
                event(new SettingPermanentlyDeleted($setting));
                return $setting;
            }

            throw new GeneralException(__('backend_settings.exceptions.delete_error'));
        });
    }

    /**
     * Restore the specified soft deleted resource.
     *
     * @param Setting $setting
     *
     * @return Setting
     * @throws GeneralException
     */
    public function restore(Setting $setting) : Setting
    {
        if (is_null($setting->deleted_at)) {
            throw new GeneralException(__('backend_settings.exceptions.cant_restore'));
        }

        if ($setting->restore()) {
            event(new SettingRestored($setting));

            return $setting;
        }

        throw new GeneralException(__('backend_settings.exceptions.restore_error'));
    }
}
