<?php

namespace Modules\Department\Http\Requests\Admission;

use Illuminate\Foundation\Http\FormRequest;

class AdmissionFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "first_name" => "required|string",
            "middle_name" => "required|string",
            "last_name" => "required|string",
            "gender" => "required",
            "religion" => "required",
            "email" => "required|email|unique:students",
            "admission_no" => "required|unique:admissions",
            "phone" => "required",
            "state" => "required",
            "lga" => "required",
            "address" => "required",
            "picture" => 'required|image|mimes:jpeg,bmp,png,jpg'
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(headOfDepartment() || examOfficer()){
            return true;
        }
        return false;
    }
}
