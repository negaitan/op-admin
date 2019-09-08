<?php

namespace App\Repositories\Backend;

use App\Models\Plan;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\Plan\PlanCreated;
use App\Events\Backend\Plan\PlanUpdated;
use App\Events\Backend\Plan\PlanPermanentlyDeleted;
use App\Events\Backend\Plan\PlanRestored;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class PlanRepository.
 */
class PlanRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return Plan::class;
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
     * @return Plan
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : Plan
    {
        return DB::transaction(function () use ($data) {
            $plan = parent::create([
                'title' => $data['title'],
            ]);

            if ($plan) {

                event(new PlanCreated($plan));

                return $plan;
            }

            throw new GeneralException(__('backend_plans.exceptions.create_error'));
        });
    }

    /**
     * @param Plan  $plan
     * @param array     $data
     *
     * @return Plan
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(Plan $plan, array $data) : Plan
    {
        return DB::transaction(function () use ($plan, $data) {
            if ($plan->update([
                'title' => $data['title'],
            ])) {
                event(new PlanUpdated($plan));

                return $plan;
            }

            throw new GeneralException(__('backend_plans.exceptions.update_error'));
        });
    }

    /**
     * @param Plan $plan
     *
     * @return Plan
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(Plan $plan) : Plan
    {
        if (is_null($plan->deleted_at)) {
            throw new GeneralException(__('backend_plans.exceptions.delete_first'));
        }

        return DB::transaction(function () use ($plan) {
            if ($plan->forceDelete()) {
                event(new PlanPermanentlyDeleted($plan));
                return $plan;
            }

            throw new GeneralException(__('backend_plans.exceptions.delete_error'));
        });
    }

    /**
     * Restore the specified soft deleted resource.
     *
     * @param Plan $plan
     *
     * @return Plan
     * @throws GeneralException
     */
    public function restore(Plan $plan) : Plan
    {
        if (is_null($plan->deleted_at)) {
            throw new GeneralException(__('backend_plans.exceptions.cant_restore'));
        }

        if ($plan->restore()) {
            event(new PlanRestored($plan));

            return $plan;
        }

        throw new GeneralException(__('backend_plans.exceptions.restore_error'));
    }
}
