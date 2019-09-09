<?php

namespace App\Http\Requests\Backend\Amenity;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateAmenityRequest.
 */
class UpdateAmenityRequest extends FormRequest
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
        $amenity_id = request()->route()->parameters['amenity']->id;
        return [
            'key'   => ['required', 'max:191', 'unique:amenities,key,'.$amenity_id],
            'value' => ['required', 'max:191'],
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
