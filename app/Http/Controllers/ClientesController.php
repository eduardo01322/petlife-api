<?php

namespace App\Http\Controllers;

use App\Http\Requests\Clientesrequest;
use App\Models\Clientes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientesController extends Controller
{
    public function Clientes(Clientesrequest $request){
        $cliente= Clientes::create([
            'nome'=> $request ->nome,
            'cpf'=> $request ->cpf,
            'email'=> $request ->email,
            'password'=>Hash::make($request->password),
            'telefone'=> $request ->telefone,
            'bairro'=> $request ->bairro,
            'rua'=> $request ->rua,
            'numero'=> $request ->numero
        ]);

        return response()->json([
            "sucess"=>true,
            "message"=> "Usuario Cadastrado com sucesso",
        "data"=> $cliente
        ]);
    }
    
    public function pesquisarPorId($id){
        return Clientes::find($id);
    }
}
