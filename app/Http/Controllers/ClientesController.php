<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesRequest;
use App\Models\clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientesController extends Controller
{
    public function clientes(ClientesRequest $request){
        $clientes = clientes::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefone' => $request->telefone,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'n° da residencia' => $request->n°
        ]);

        return response()->json([
            "success" => true,
            "message" => "usuario cadastrado com sucesso",
            "data" => $clientes
        ], 200);
    }
}
