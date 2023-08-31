<?php

namespace App\Http\Controllers;

use App\Http\Requests\fornecedorRequest;
use App\Models\fornecedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class fornecedorcontroller extends Controller
{
    public function fornecedor(fornecedorRequest $request){
        $fornecedor = fornecedor::create([
            'nome' => $request->nome,
            'cnpj' => $request->cnpj,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'produto' => $request->produto,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            "success" => true,
            "message" => "Fornecedor Cadastrado com sucesso",
            "data" => $fornecedor
        ], 200);
    }
    public function IdFornecedor($id){
        return fornecedor::find($id);
    }
}
