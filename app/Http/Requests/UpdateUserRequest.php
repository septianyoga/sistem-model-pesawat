<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            //
            'name'  => ['required'],
            'username'  => ['required', 'unique:users,username,' . $this->id],
            'email'  => ['required', 'email', 'unique:users,email,' . $this->id],
            'role'  => ['required']
        ];
    }
}
