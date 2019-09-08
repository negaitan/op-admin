<?php

namespace App\Http\Requests\Backend\ClassGroup;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreClassGroupRequest.
 */
class StoreClassGroupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => ['required', 'max:191'],
            'logo_image_id'     => ['required', 'integer', 'exists:images,id'],
            'description'       => ['required'],
            'cover_image_id'    => ['required', 'integer', 'exists:images,id'],
            'video_url'         => ['required', 'url'],
            'classes'           => ['required'],
            'teacher_image_id'  => ['required', 'integer', 'exists:images,id'],
            'teacher_name'      => ['required', 'max:191'],
            'teacher_title'     => ['required', 'max:191'],
            'teacher_text'      => ['required'],
            'playlist_url'      => ['required', 'url'],
        ];
    }

    /**
     * Custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'    => 'The :attribute field is required.',
            'name.max'         => 'The :attribute field must have less than :max characters',
        ];
    }
}
