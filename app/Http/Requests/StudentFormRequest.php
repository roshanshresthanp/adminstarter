<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentFormRequest extends FormRequest
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
            'student_name'=>'required|max:250',
            'applied_stream'=>'required|max:250',
            'image'=>'nullable|mimes:svg,png,webp,jpeg,jpg',
            'gender'=>'required|max:250',
            'nationality'=>'required|max:250',
            'email'=>'required|email|max:250',
            'dob_bs'=>'required|max:250',
            'dob_ad'=>'required|max:250',
            'current_grade'=>'required|max:250',
            'age'=>'required|max:250',
            'address'=>'required|max:250',
            'student_contact'=>'required|max:250',

            'father_name'=>'required|max:250',
            'father_contact'=>'required|max:250',
            'father_email'=>'required|email|max:250',
            'father_occupation'=>'required|max:250',

            // 'mother_name'=>'required|max:250',
            // 'mother_contact'=>'required|max:250',
            // 'mother_email'=>'required|email|max:250',
            // 'mother_occupation'=>'required|max:250',

            // 'local_name'=>'required|max:250',
            // 'local_contact'=>'required|max:250',
            // 'local_email'=>'required|email|max:250',
            // 'local_occupation'=>'required|max:250',

            'employment_status'=>'required|max:250',
            'marital_status'=>'required|max:250',
            'passed_year'=>'required|max:250',
            'passed_division'=>'required|max:250',
            'type'=>'required',
            'previous_school'=>'required|max:250',
            // 'previous_address'=>'required|max:250',
            'previous_gpa'=>'required|max:250',
            'message'=>'required|max:250'
        ];
    }
}
