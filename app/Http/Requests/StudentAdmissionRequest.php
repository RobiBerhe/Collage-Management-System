<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentAdmissionRequest extends FormRequest
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
            'student_application_id'=>'required|numeric',
            'date_of_admission'=>'required|date',
            'graduation_year'=>'required',
            'admission'=>'required|string',
            'program'=>'required|numeric',
            'department'=>'required|numeric',
            'section'=>'required|numeric',
        ];
    }
}
