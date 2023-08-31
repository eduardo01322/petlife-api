<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionariosRequest;
use App\Models\funcionarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class funcionarioscontroller extends Controller
{
    public function funcionarios(FuncionariosRequest $request){
        $funcionario= funcionarios::create([
            'nome'=> $request ->nome,
            'cpf'=> $request ->cpf,
            'email'=> $request ->email,
            'password'=>Hash::make($request->password),
            'ocupação'=>$request ->ocupação
        ]);

        return response()->json([
            "sucess"=>true,
            "message"=> "Funcionario Cadastrado com sucesso",
        "data"=> $funcionario
        ]);
    }
    public function IdFuncionarios($id){
        return funcionarios::find($id);
    }
}
