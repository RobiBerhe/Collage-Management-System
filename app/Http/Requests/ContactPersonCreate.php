<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactPersonCreate extends FormRequest
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
            'application_id'=>'required|numeric',
            'first_name'=>'required|string',
            'middle_name'=>'required|string',
            'last_name'=>'required|string',
            'city'=>'required|string',
            'sub_city'=>'required|string',
            'kebele'=>'required|numeric',
            'phone_home'=>'required|string',
        ];
    }
}
