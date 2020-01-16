<?php

namespace App\Http\Requests\Backend\Flash;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StoreFlashRequest.
 */
class StoreFlashRequest extends FormRequest
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
            'zona'                  => ['required', 'max:191'],
            'name_plan'             => ['required'],
            'precio_flash'          => ['required', 'numeric'],
            'label_flash'           => ['required'],
            'precio_especial'       => ['required', 'numeric'],
            'label_especial'        => ['required'],
            'precio_onSale'         => ['required', 'numeric'],
            'label_onSale'          => ['required'],
            'precio_regular'        => ['required', 'numeric'],
            'label_regular'         => ['required'],

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
