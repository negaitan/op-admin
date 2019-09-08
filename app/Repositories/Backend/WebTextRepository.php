<?php

namespace App\Repositories\Backend;

use App\Models\WebText;
use Illuminate\Support\Facades\DB;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Events\Backend\WebText\WebTextCreated;
use App\Events\Backend\WebText\WebTextUpdated;
use App\Events\Backend\WebText\WebTextPermanentlyDeleted;
use App\Events\Backend\WebText\WebTextRestored;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class WebTextRepository.
 */
class WebTextRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model()
    {
        return WebText::class;
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
     * @return WebText
     * @throws \Exception
     * @throws \Throwable
     */
    public function create(array $data) : WebText
    {
        return DB::transaction(function () use ($data) {
            $web_text = parent::create([
                'title' => $data['title'],
            ]);

            if ($web_text) {

                event(new WebTextCreated($web_text));

                return $web_text;
            }

            throw new GeneralException(__('backend_web_texts.exceptions.create_error'));
        });
    }

    /**
     * @param WebText  $web_text
     * @param array     $data
     *
     * @return WebText
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function update(WebText $web_text, array $data) : WebText
    {
        return DB::transaction(function () use ($web_text, $data) {
            if ($web_text->update([
                'title' => $data['title'],
            ])) {
                event(new WebTextUpdated($web_text));

                return $web_text;
            }

            throw new GeneralException(__('backend_web_texts.exceptions.update_error'));
        });
    }

    /**
     * @param WebText $web_text
     *
     * @return WebText
     * @throws GeneralException
     * @throws \Exception
     * @throws \Throwable
     */
    public function forceDelete(WebText $web_text) : WebText
    {
        if (is_null($web_text->deleted_at)) {
            throw new GeneralException(__('backend_web_texts.exceptions.delete_first'));
        }

        return DB::transaction(function () use ($web_text) {
            if ($web_text->forceDelete()) {
                event(new WebTextPermanentlyDeleted($web_text));
                return $web_text;
            }

            throw new GeneralException(__('backend_web_texts.exceptions.delete_error'));
        });
    }

    /**
     * Restore the specified soft deleted resource.
     *
     * @param WebText $web_text
     *
     * @return WebText
     * @throws GeneralException
     */
    public function restore(WebText $web_text) : WebText
    {
        if (is_null($web_text->deleted_at)) {
            throw new GeneralException(__('backend_web_texts.exceptions.cant_restore'));
        }

        if ($web_text->restore()) {
            event(new WebTextRestored($web_text));

            return $web_text;
        }

        throw new GeneralException(__('backend_web_texts.exceptions.restore_error'));
    }
}
