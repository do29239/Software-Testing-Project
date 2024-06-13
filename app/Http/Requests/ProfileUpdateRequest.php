<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $this->user()->id],
            'saloon_name' => ['nullable', 'required_if:role,3', 'string', 'max:255'],
            'saloon_address' => ['nullable', 'required_if:role,3', 'string'],
            'saloon_city' => ['nullable', 'required_if:role,3', 'string', 'max:255'],
            'saloon_phone' => ['nullable', 'required_if:role,3', 'string', 'max:255'],
        ];
    }
}
