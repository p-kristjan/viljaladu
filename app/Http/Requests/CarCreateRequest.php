<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'license_plate' => 'required|max:30',
            'entry_mass' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'license_plate.max' => 'License plate should not exceed :max characters in length.',
        ];
    }
}
