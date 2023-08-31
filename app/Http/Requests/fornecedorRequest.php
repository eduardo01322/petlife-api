<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class fornecedorRequest extends FormRequest
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
            'cnpj' => 'required|max:11|min:11|unique:fornecedor,cnpj',
            'email' => 'required|email|unique:fornecedor,email',
            'password' => 'required',
            'telefone' => 'required|max:15|min:10',
            'produto' => 'required|max:80|min:5'
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'sucess' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatorio',
            'nome.max' => 'O campo nome deve ter no maximo 80 caracteres',
            'nome.min' => 'O campo nome deve ter no minimo 5 caracteres',
            'cnpj.required' => 'O campo CNPJ é obrigatorio',
            'cnpj.max' => 'CNPJ deve ter no maximo 11 caracteres',
            'cnpj.min' => 'CNPJ deve ter no maximo 11 caracteres',
            'cnpj.unique' => 'CNPJ já cadastrado no sistema',
            'telefone, required' => 'O numero de telefone é obrigatorio',
            'telefone.max' => 'O numero de telefone deve conter no maximo 15',
            'telefone.min' => 'O numero de telefone deve conter no minimo 10',
            'email.required' => 'O Email é obrigatorio',
            'email.email' => 'formato de email invalido',
            'email.unique' => 'Email já cadastrado',
            'password.required' => 'Senha obrigatoria',
            'produto.required' => 'O campo produto é obrigatorio',
            'produto.max' => 'O campo produto deve ter no maximo 80 caracteres',
            'produto.min' => 'O campo produto deve ter no minimo 5 caracteres',
        ];
    }
}
