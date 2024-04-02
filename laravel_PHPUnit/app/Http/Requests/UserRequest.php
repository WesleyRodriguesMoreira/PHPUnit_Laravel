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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages(): array
    {
       return[
        'name.required' => 'Campo name é obrigatório',
        'name.max' => 'Campo name só pode te no máximo 255 caracteres',
        'email.required' => 'Campo email é obrigatório',
        'email.max' => 'Campo email  só pode te no máximo 255 caracteres',
        'password.required' => 'Campo password é obrigatório',
        'password.max' => 'Campo password  só pode te no minímo 8 caracteres',
       ]; 
    }
}
