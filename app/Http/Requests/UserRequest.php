<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize(): bool
    {
        if (auth()->user()->user_type == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public function rules(): array
    {
        $id = $this->route('user'); // Retrieve the 'user' route parameter

        if ($this->route()->getName() == 'users.update') {
            return [
                'name' => ['required', 'string', 'max:255'],
                'user_type' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id, 'id')],
                'password' => ['nullable', 'string', 'min:8', 'confirmed'],
                'province_id' => ['required', 'integer', 'exists:provinces,id'],
                'division_id' => ['required', 'integer', 'exists:divisions,id'],
            ];
        } else {
            return [
                'name' => ['required', 'string', 'max:255'],
                'user_type' => ['required'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'province_id' => ['required', 'integer', 'exists:provinces,id'],
                'division_id' => ['required', 'integer', 'exists:divisions,id'],
            ];
        }
    }
}
