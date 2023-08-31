<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Petrequest extends FormRequest
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
            'nome'=>'required|max:30|min:2',
            'idade'=>'required|max:2|min:1',
            'raca' =>'required|max:20|min:5',
            'requerimentos'=> 'required',
            'enfermidades' =>'required'
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
            'nome.max' => 'O campo nome deve ter no maximo 30 caracteres',
            'nome.min' => 'O campo nome deve ter no minimo 2 caracteres',
            'idade.required'=> 'O campo idade é obrigatorio',
            'idade.max'=> 'O campo de idade tem que ter 2 caracteres',
            'idade.min'=> 'O campo idade tem que ter no minimo 1 caracter',
            'raca.required'=> 'O campo raça é obrigatorio',
            'raca.max'=> 'O campo raça deve ter no maximo 20 caracteres',
            'raca.min'=>'O campo raça deve ter no minimo 5 caracteres',
            'requerimentos.required'=>'O campo de requerimentos é obrigatorio',
            'enfermidades.required'=>'O campo de enfermidades é obrigatorio'
        ];
}
}
