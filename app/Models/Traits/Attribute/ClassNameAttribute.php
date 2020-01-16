<?php

namespace App\Models\Traits\Attribute;

use Illuminate\Support\Facades\Hash;

/**
 * Trait ClassNameAttribute.
 */
trait ClassNameAttribute
{
    /**
     * @return string
     */
    public function getShowButtonAttribute()
    {
        return '<a href="'.route('admin.class_names.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getEditButtonAttribute()
    {
        return '<a href="'.route('admin.class_names.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getDeleteButtonAttribute()
    {
        return '<a href="'.route('admin.class_names.destroy', $this).'"
                title="'.__('buttons.general.crud.delete').'"
                data-method="delete"
                data-trans-button-cancel="'.__('buttons.general.cancel').'"
                data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                data-trans-title="'.__('strings.backend.general.are_you_sure').'"
                class="btn btn-danger"><i class="fas fa-trash"></i></a> ';
    }

    /**
     * @return string
     */
    public function getDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('admin.class_names.delete-permanently', $this).'" name="confirm_item" class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.class_names.delete_permanently').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getRestoreButtonAttribute()
    {
        return '<a href="'.route('admin.class_names.restore', $this).'" name="confirm_item" class="btn btn-info"><i class="fas fa-sync" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.class_names.restore').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getActionButtonsAttribute()
    {
        return '
    	<div class="btn-group" role="group" aria-label="'.__('labels.backend.class_names.actions').'">
		  '.$this->show_button.'
		  '.$this->edit_button.'
		  '.$this->delete_button.'
        </div>';
    }

    /**
     * @return string
     */
    public function getTrashedButtonsAttribute()
    {
        return '
            <div class="btn-group" role="group" aria-label="'.__('labels.backend.class_names.actions').'">
                '.$this->restore_button.'
                '.$this->delete_permanently_button.'
            </div>';
    }

    /**
     * @return string
     */
    public function getFrontendShowButtonAttribute()
    {
        return '<a href="'.route('frontend.class_names.show', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>';
    }

    /**
     * @return string
     */
    public function getFrontendEditButtonAttribute()
    {
        return '<a href="'.route('frontend.class_names.edit', $this).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>';
    }

    /**
     * @return string
     */
    public function getFrontendDeleteButtonAttribute()
    {
        return '<a href="'.route('frontend.class_names.destroy', $this).'"
                title="'.__('buttons.general.crud.delete').'"
                data-method="delete"
                data-trans-button-cancel="'.__('buttons.general.cancel').'"
                data-trans-button-confirm="'.__('buttons.general.crud.delete').'"
                data-trans-title="'.__('strings.backend.general.are_you_sure').'"
                class="btn btn-danger"><i class="fas fa-trash"></i></a> ';
    }

    /**
     * @return string
     */
    public function getFrontendDeletePermanentlyButtonAttribute()
    {
        return '<a href="'.route('frontend.class_names.delete-permanently', $this).'" name="confirm_item" class="btn btn-danger"><i class="fas fa-trash" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.class_names.delete_permanently').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getFrontendRestoreButtonAttribute()
    {
        return '<a href="'.route('frontend.class_names.restore', $this).'" name="confirm_item" class="btn btn-info"><i class="fas fa-sync" data-toggle="tooltip" data-placement="top" title="'.__('buttons.backend.class_names.restore').'"></i></a> ';
    }

    /**
     * @return string
     */
    public function getFrontendActionButtonsAttribute()
    {
        return '
    	<div class="btn-group" role="group" aria-label="'.__('labels.backend.class_names.actions').'">
		  '.$this->frontend_show_button.'
		  '.$this->frontend_edit_button.'
		  '.$this->frontend_delete_button.'
        </div>';
    }

    /**
     * @return string
     */
    public function getFrontendTrashedButtonsAttribute()
    {
        return '
            <div class="btn-group" role="group" aria-label="'.__('labels.backend.class_names.actions').'">
                '.$this->frontend_restore_button.'
                '.$this->frontend_delete_permanently_button.'
            </div>';
    }
}
