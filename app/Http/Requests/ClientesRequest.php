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
            'cpf' => 'required|max:11|min:11|unique;clientes,cpf',
            'email' => 'required|email|unique;clientes,email',
            'password' => 'required',
            'telefone' => 'required|max:15|min:10',
            'bairro' => 'required|max:80|min:5',
             'rua' => 'required|max:30|min:10',
             'numero' => 'required|max:6|min:1',
        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }
    public function messages(){

        return[
            'nome.required' => 'o nome é obrigatorio',
            'nome.max' => 'o campo nome deve contar no maximo 80 caracteres',
            'nome.min' => 'o campo nome deve contar no minimo 5 caracteres',
            'cpf.required' => 'o cpf é obrigatorio',
            'cpf.max' => 'o campo cpf deve contar no maximo 11 caracteres',
            'cpf.min' => 'o campo cpf deve contar no minimo 11 caracteres',
            'cpf.unique' => 'cpf ja cadastrado no sistema',
            'email.required' => 'o email é obrigatorio',
            'email.email' => 'formato de email invalido',
            'email.unique' => 'email ja cadastrado no sistema',
            'password.required' => 'senha obrigatorio',
            'telefone.required' => 'o telefone é obrigatorio',
            'telefone.max' => 'o campo telefone deve contar no maximo 15 caracteres',
            'telefone.min' => 'o campo telefone deve contar no minimo 10 caracteres',
            'bairro.required' => 'o bairro é obrigatorio',
            'bairro.max' => 'o campo bairro deve contar no maximo 80 caracteres',
            'bairro.min' => 'o campo bairro deve contar no minimo 5 caracteres',
            'rua.required' => 'o rua é obrigatorio',
            'rua.max' => 'o campo rua deve contar no maximo 30 caracteres',
            'rua.min' => 'o campo rua deve contar no minimo 10 caracteres',
            'numero.required' => 'o numero é obrigatorio',
            'numero.max' => 'o campo numero deve contar no maximo 1 caracteres',
            'numero.min' => 'o campo numero deve contar no minimo 6 caracteres',
            
        ];
    }
}
