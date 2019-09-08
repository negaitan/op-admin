<?php

namespace App\Http\Requests\Backend\WebText;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateWebTextRequest.
 */
class UpdateWebTextRequest extends FormRequest
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
        $web_text_id = request()->route()->parameters['web_text']->id; // admin/web_texts/2/update  0/1/2/3
        return [
            'key'     => ['required', 'max:191', 'unique:web_texts,key,'.$web_text_id],
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
