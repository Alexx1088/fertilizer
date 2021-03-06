<?php

namespace App\Http\Requests\Admin\Clients;

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
            'agreement_date_from' => 'nullable',
            'agreement_date_to' => 'nullable',
            'delivery_cost_from' => 'nullable',
            'delivery_cost_to' => 'nullable',
            'regions' => 'nullable',
        ];
    }
}
