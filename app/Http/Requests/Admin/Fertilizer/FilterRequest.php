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
            'name' => '|string',
            'nitrogen_rate_from' => '',
            'nitrogen_rate_to' => '',
            'phosphorus_rate_from' => '|',
            'phosphorus_rate_to' => '|',
            'potassium_rate_from' => '|',
            'potassium_rate_to' => '|',
            'culture_group_id' => '|integer',
            'district' => '|string',
            'price_from' => '|',
            'price_to' => '|',
            'description' => '|string',
            'destination' => '|string',
        ];
    }
}
