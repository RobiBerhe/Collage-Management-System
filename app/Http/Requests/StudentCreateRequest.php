<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentCreateRequest extends FormRequest
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
            'first_name'=>'required|min:3|string',
            'middle_name'=>'required|string|min:3',
            'last_name'=>'required|string|min:3',
            'date_of_birth'=>'required|date',
            'place_of_birth'=>'required|string|min:3',
            'gender'=>'required|string',
            'city'=>'required|string|min:3',
            'sub_city'=>'required|string|min:3',
            'kebele'=>'required|numeric',
        ];
    }
}
