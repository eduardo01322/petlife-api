<?php

namespace App\Http\Controllers;

use App\Http\Requests\Petrequest;
use App\Models\PetModel;
use Illuminate\Http\Request;

class petcontroller extends Controller
{
    public function Pet(Petrequest $request)
    {
        $Pet=PetModel::create([
            'nome' => $request->nome,
            'idade' => $request->idade,
            'raca' => $request->raca,
            'requerimentos' => $request->requerimentos,
            'enfermidades' => $request->enfermidades
        ]);

 return response()->json([
            "sucess"=>true,
            "message"=> "Seu Pet foi Cadastrado com sucesso",
        "data"=> $Pet
        ]);
    }
    public function IdPet($id){
        return PetModel::find($id);
    }
}
