<?php

namespace App\Http\Requests\Backend\GymClass;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateGymClassRequest.
 */
class UpdateGymClassRequest extends FormRequest
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
            'class_name_id'  => ['required', 'integer', 'exists:class_names,id'],
            'teacher'   => ['required', 'max:191'],
            'day_time'  => ['required', 'max:191'],
            'week_days' => ['required', 'max:191'],
            'start_at'  => ['required', 'max:8'],
            'finish_at' => ['required', 'max:8'],
            'room'      => ['required', 'max:191'],
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
