<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientesRequest;
use App\Models\clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientesController extends Controller
{
    public function Cliente(ClientesRequest $request){
        $cliente = clientes::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefone' => $request->telefone,
            'bairro' => $request->bairro,
            'rua' => $request->rua,
            'numero' => $request->numero
        ]);

        return response()->json([
            "success" => true,
            "message" => "usuario cadastrado com sucesso",
            "data" => $cliente
        ], 200);
    }
}
