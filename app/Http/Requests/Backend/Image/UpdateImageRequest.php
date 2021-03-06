<?php

namespace App\Http\Requests\Backend\Image;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateImageRequest.
 */
class UpdateImageRequest extends FormRequest
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
        $image_id = request()->route()->parameters['image']->id;
        return [
            'internal_key'  => ['required', 'max:191', 'unique:images,internal_key,' . $image_id],
            // 'url'           => ['max:191', 'url'],
            'alt'           => ['required', 'max:191'],
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
            'title.required'    => 'The :attribute field is required.',
            'title.max'         => 'The :attribute field must have less than :max characters',
        ];
    }
}
