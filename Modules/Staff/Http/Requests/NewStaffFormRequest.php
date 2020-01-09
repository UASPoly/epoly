<?php

namespace Modules\Staff\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewStaffFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'gender'=>'required',
            'religion'=>'required',
            'tribe'=>'required',
            'address'=>'required',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'department'=>'required',
            'category'=>'required',
        ];
        if(!$this->has('update')){
            $rules['phone'] = 'required|unique:staff';
            $rules['email'] = 'required|unique:staff';
            $rules['staffID'] = 'required|unique:staff';
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
        if(admin()){
            return true;
        }
        return false;
    }
}
