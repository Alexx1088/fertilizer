<?php

namespace App\Http\Requests\Admin\Fertilizer;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'nullable',
            'nitrogen_rate_from' => 'nullable',
            'nitrogen_rate_to' => 'nullable',
            'phosphorus_rate_from' => 'nullable',
            'phosphorus_rate_to' => 'nullable',
            'potassium_rate_from' => 'nullable',
            'potassium_rate_to' => 'nullable',
            'culture_group_ids' => 'nullable',
            'price_from' => 'nullable',
            'price_to' => 'nullable',
            'description' => 'nullable',
            'destination' => 'string',
            'districts' => 'nullable',

        ];
    }
}
