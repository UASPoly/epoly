<?php

namespace Modules\Admin\Http\Requests\College\Department\Management;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLecturerFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'gender'=>'required',
            'religion'=>'required',
            'address'=>'required',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'phone' => 'required',
            'email' => 'required',
            'staffID' => 'required',
        ];
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
