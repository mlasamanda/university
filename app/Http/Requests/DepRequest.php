<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class DepRequest extends FormRequest
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
            'department.name' => 'required',
        ];
        $request = Request::capture();
        $departmentarray = $request->get('department');
        if (empty($departmentarray['id'])) {//new
            $rules['department.name'] = ['required', Rule::unique('departments', 'name')];
        } else {//update
            $rules['department.name'] = ['required', Rule::unique('departments', 'name')->ignore($departmentarray['id'])];
        }


        return $rules;
    }

    public function messages()
    {
        return [
            'department.name.required' => 'Department name is required',
        ];
    }
}
