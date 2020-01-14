<?php

namespace Modules\Department\Http\Requests\Admission;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdmissionFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            "first_name" => "required|string",
            "middle_name" => "",
            "last_name" => "required|string",
            "gender" => "required",
            "religion" => "required",
            "phone" => "required",
            "state" => "required",
            "lga" => "required",
            "address" => "required",
            "date_of_birth" => "required"
        ];
        if($this->has('picture')){
            $rules['picture'] = 'required|image|mimes:jpeg,bmp,png,jpg';
        }
        return $rules;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
