<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:5|max:8'
        ];
    }

    public function messages()
    {
        return [
            //
            'name.requires' => 'O campo nome é obrigatório',
            'email.required' => 'O campo email é obrigatório',
            'password.required' => 'O campo Senha é obrigatório|min:5|max:8',
            'password.min' => 'A senha deve possuir no mínimo 5 caracteres',
            'password.max' => 'A senha deve possuir no máximo 8 caracteres'
        ];
    }
}
