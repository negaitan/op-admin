<?php

namespace App\Http\Requests\Backend\ClassName;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateClassNameRequest.
 */
class UpdateClassNameRequest extends FormRequest
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

    public function rules()
    {
        $class_name_id = request()->route()->parameters['class_name']->id; // admin/class_names/2/update  0/1/2/3
        return [
            'key'     => ['required', 'max:191', 'unique:class_names,key,'.$class_name_id],
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
