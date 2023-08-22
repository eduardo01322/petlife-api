<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ClientesRequest extends FormRequest
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
            'telefone' => 'required|max:15|min:10',
            'email' => 'required|email|unique:clientes,email',
            'password' => 'required',
            'bairro' => 'required|max:80|min:5',
            'rua' => 'required|max:30|min:10',
            'numero' => 'required|max:6|min:1',
        ];
    }
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages()
    {
        return [
            'nome.required' => 'O campo nome é obrigatorio',
            'nome.max' => 'O campo nome deve ter no maximo 80 caracteres',
            'nome.min' => 'O campo nome deve ter no minimo 5 caracteres',
            'cpf.required' => 'O campo CPF é obrigatorio',
            'cpf.max' => 'CPF deve ter no maximo 11 caracteres',
            'cpf.min' => 'CPF deve ter no maximo 11 caracteres',
            'cpf.unique' => 'CPF já cadastrado no sistema',
            'telefone, required' => 'O numero de telefone é obrigatorio',
            'telefone.max' => 'O numero de telefone deve conter no maximo 15',
            'telefone.min' => 'O numero de telefone é deve conter no minimo 10',
            'email.required' => 'O Email é obrigatorio',
            'email.email' => 'formato de email invalido',
            'email.unique' => 'O Email já cadastrado',
            'password.required' => 'Senha obrigatoria',
            'bairro.required' => 'O campo bairro é obrigatorio',
            'bairro.max' => 'O campo nome deve ter no maximo 80 caracteres',
            'bairro.min' => 'O campo nome deve ter no minimo 5 caracteres',
            'rua.required' => 'O campo rua é obrigatorio',
            'rua.max' => 'O campo rua deve ter no maximo 30 caracteres',
            'rua.min' => 'O campo nome deve ter no minimo 10 caracteres',
            'numero.required' => 'O campo numero é obrigatorio',
            'numero.max' => 'O campo numero deve ter no maximo 6 caracteres',
            'numero.min' => 'O campo numero deve ter no minimo 1 caracteres'
        ];
    }
}
