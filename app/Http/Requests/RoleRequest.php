<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
        return [
            'role.name' => 'required'
        ];

        $request = Request::capture();
        $userarray = $request->get('user');
        if (empty($userarray['id'])) {//new
            $rules['role.name'] = ['required', Rule::unique('roles', 'name')];
         } else {//update
            //$rules['user.username'] = ['required', Rule::unique('users', 'username')->ignore($userarray['id'])];
            $rules['role.name'] = ['required', Rule::unique('roles', 'name')->ignore($userarray['id'])];
        }
    }
}
