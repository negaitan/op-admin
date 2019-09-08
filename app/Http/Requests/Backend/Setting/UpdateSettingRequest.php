<?php

namespace App\Http\Requests\Backend\Setting;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateSettingRequest.
 */
class UpdateSettingRequest extends FormRequest
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
        $setting_id = request()->route()->parameters['setting']->id; // admin/settings/2/update  0/1/2/3
        return [
            'key'     => ['required', 'max:191', 'unique:settings,key,'.$setting_id],
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
