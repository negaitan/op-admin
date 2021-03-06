<?php

namespace App\Http\Requests\Backend\ClassName;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreClassNameRequest.
 */
class StoreClassNameRequest extends FormRequest
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
            'key'     => ['required', 'max:191', 'unique:class_names,key'],
            'value'     => ['required', 'string'],
            'exposed'     => ['required', 'boolean'],
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
            'key.required'    => 'The :attribute field is required.',
            'key.max'         => 'The :attribute field must have less than :max characters',
        ];
    }
}
