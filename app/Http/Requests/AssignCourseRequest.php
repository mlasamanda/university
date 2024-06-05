<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class AssignCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [
            'course.courseid' => 'required',
            'course.programmeid' => 'required',
            'course.semesterid' => 'required',
         ];
        $request = Request::capture();
        $departmentarray = $request->get('course');
        if (empty($departmentarray['id'])) {//new
            $rules['course.courseid'] = ['required',
                Rule::unique('assign_courses', 'programmeid')];
        } else {//update
            $rules['course.courseid'] = ['required', Rule::unique('assign_courses', 'name')->ignore($departmentarray['id'])];

        }


        return $rules;
    }

    public function messages()
    {
        return [
            'course.courseid.required' => 'course name is required',
            'course.programmeid.required' => 'Programme name is required',
            'course.semesterid.required' => 'Semester name is required',
         ];
    }
}
