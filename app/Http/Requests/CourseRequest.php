<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class CourseRequest extends FormRequest
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
            'course.name' => 'required',
            'course.departmentid' => 'required',
            'course.code' => 'required',
            'course.credit' => 'required',
         ];
        $request = Request::capture();
        $departmentarray = $request->get('course');
        if (empty($departmentarray['id'])) {//new
            $rules['course.name'] = ['required', Rule::unique('courses', 'name')];
            $rules['course.code'] = ['required', Rule::unique('courses', 'code')];

        } else {//update
            $rules['course.name'] = ['required', Rule::unique('courses', 'name')->ignore($departmentarray['id'])];
            $rules['course.code'] = ['required', Rule::unique('courses', 'code')->ignore($departmentarray['id'])];

        }


        return $rules;
    }

    public function messages()
    {
        return [
            'course.name.required' => 'course name is required',
            'course.departmentid.required' => 'Department name is required',
            'course.code.required' => 'course code is required',
            'course.credit.required' => 'Credit name is required',
        ];
    }
}
