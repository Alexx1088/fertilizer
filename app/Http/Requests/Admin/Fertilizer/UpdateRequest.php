<?php

namespace App\Http\Requests\Admin\Fertilizer;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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

            'name'=>'required|string',
            'nitrogen_rate'=> 'required|',
            'phosphorus_rate'=> 'required|',
            'potassium_rate'=> 'required|',
            'culture_group_id' => 'required|integer',
            'district' => 'required|string',
            'price' => 'required|',
            'description' => 'required|string',
            'destination' => 'required|string',
        ];
    }
}
