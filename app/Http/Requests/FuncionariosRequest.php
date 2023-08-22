<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FuncionariosRequest extends FormRequest
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
        return [
            'nome' => 'required|max:80|min:5',
            'cpf' => 'required|max:11|min:11|unique:clientes,cpf',
            'email' => 'required|email|unique:clientes,email',
            'password' => 'required',
            'ocupação' => 'required|max:50|min:1',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages(){
        return [
            'nome.required' => 'O campo nome é obrigatorio',
            'nome.max' => 'O campo nome deve ter no maximo 80 caracteres',
            'nome.min' => 'O campo nome deve ter no minimo 5 caracteres',
            'cpf.required' => 'O campo CPF é obrigatorio',
            'cpf.max' => 'CPF deve ter no maximo 11 caracteres',
            'cpf.min' => 'CPF deve ter no maximo 11 caracteres',
            'cpf.unique' => 'CPF já cadastrado no sistema',
            'email.required' => 'O Email é obrigatorio',
            'email.email' => 'formato de email invalido',
            'email.unique' => 'O Email já cadastrado',
            'password.required' => 'Senha obrigatoria',
            'ocupação.required' => 'O campo ocupação é obrigatorio',
            'ocupação.max' => 'O campo ocupação deve ter no maximo 50 caracteres',
            'ocupação.min' => 'O campo ocupação deve ter no minimo 1 caracteres',
        ];
    }
}
