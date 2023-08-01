<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string',
            'family' => 'required|string',
            'gender' => 'required|string',
            'image' => 'image|mimes:png,jpg,jpeg,svg|max:2048',
            'national_code' => '',
            'phone_number' => '',
            'date_of_birth' => '',
        ];

        if (request()->method() == self::METHOD_POST) {
            $rules['email'] = 'required|email|unique:users,email';
            $rules['password'] = 'required|min:6';
            $rules['c_password'] = 'required|same:password';
        } elseif (request()->method() == self::METHOD_PATCH) {
            $rules['email'] = 'required|email|unique:users,email,' . $this->user->id;
        }

        return $rules;
    }
}
