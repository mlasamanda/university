<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class ProgrammeRequest extends FormRequest
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
            'programme.name' => 'required',
            'programme.departmentid' => 'required',
            'programme.pcode' => 'required',
            'programme.duration' => 'required',
            'programme.tutionfees' => 'required',
        ];
        $request = Request::capture();
        $departmentarray = $request->get('programme');
        if (empty($departmentarray['id'])) {//new
            $rules['programme.name'] = ['required', Rule::unique('programmes', 'name')];
            $rules['programme.pcode'] = ['required', Rule::unique('programmes', 'pcode')];

        } else {//update
            $rules['programme.name'] = ['required', Rule::unique('programmes', 'name')->ignore($departmentarray['id'])];
            $rules['programme.pcode'] = ['required', Rule::unique('programmes', 'pcode')->ignore($departmentarray['id'])];

        }


        return $rules;
    }

    public function messages()
    {
        return [
            'programme.name.required' => 'Department name is required',
            'programme.departmentid.required' => 'Department name is required',
            'programme.pcode.required' => 'Department name is required',
            'programme.duration.required' => 'Department name is required',
            'programme.tutionfees.required' => 'Department name is required',
            'programme.tutionfees.numeric' => 'Department name is required',

        ];
    }
}
