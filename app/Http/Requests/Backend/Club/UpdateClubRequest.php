<?php

namespace App\Http\Requests\Backend\Club;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateClubRequest.
 */
class UpdateClubRequest extends FormRequest
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
            'name'         => ['required', 'max:191'],
            'web_text_id'  => ['required', 'integer', 'exists:web_texts,id'],
            'address'      => ['required', 'max:191'],
            'opening_time' => ['required', 'max:191'],
            'latitude'     => ['required', 'max:191'],
            'longitude'    => ['required', 'max:191'],
            'images'       => ['required', 'array'],
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
