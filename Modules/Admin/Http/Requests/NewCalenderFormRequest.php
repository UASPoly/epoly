<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCalenderFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'session_start' => 'required',
            'session_end' => 'required',
            'first_semester_start' => 'required',
            'first_semester_end' => 'required',
            'first_semester_course_allocatiion_start' => 'required',
            'first_semester_course_allocatiion_end' => 'required',
            'first_semester_lecture_start' => 'required',
            'first_semester_lecture_end' => 'required',
            'first_semester_exam_start' => 'required',
            'first_semester_exam_end' => 'required',
            'first_semester_exam_marking_start' => 'required',
            'first_semester_exam_marking_end' => 'required',
            'first_semester_result_upload_start' => 'required',
            'first_semester_result_upload_end' => 'required',
            'second_semester_start' => 'required',
            'second_semester_end' => 'required',
            'second_semester_course_allocation_start' => 'required',
            'second_semester_course_allocation_end' => 'required',
            'second_semester_lecture_start' => 'required',
            'second_semester_lecture_end' => 'required',
            'second_semester_exam_start' => 'required',
            'second_semester_exam_end' => 'required',
            'second_semester_exam_marking_start' => 'required',
            'second_semester_exam_marking_end' => 'required',
            'second_semester_result_upload_start' => 'required',
            'second_semester_result_upload_end' => 'required',
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
