<?php

namespace App\Http\Requests\Backend\Image;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreImageRequest.
 */
class StoreImageRequest extends FormRequest
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
            'internal_key'  => ['required', 'max:191', 'unique:images,internal_key'],
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
            'internal_key.required'    => 'The :attribute field is required.',
            'internal_key.max'         => 'The :attribute field must have less than :max characters',
        ];
    }
}
