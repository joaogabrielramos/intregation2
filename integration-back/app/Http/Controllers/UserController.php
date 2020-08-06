<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use App\Republic;

class UserController extends Controller
{
    public function createUser(UserRequest $request){
        $user = new User;
        $user->createUser($request);
        return response()->json($user);
    }

    public function deleteUser($id){
        User::destroy($id);
        return response()->json(['Usuário deletado com sucesso.']);
    }


    public function showUser($id){
        $user = User::findOrFail($id);
        return response()->json($user);
    }
    
    public function listUser(){
        $user = User::all();
        return response()->json([$user]);
    }

    public function alugar($user_id, $republic_id){
        $user = User::findOrFail($user_id);
        $user->alugar($republic_id);
        return response()->json($user);
    }

    public function anunciar($user_id, $republic_id){
        $republic = Republic::findOrFail($republic_id);
        $republic->anunciar($user_id);
        return response()->json($republic);
    }

    public function retornarRepublica($id){
        $user = User::findOrFail($id);
        return response()->json($user->republic);
    }

    public function removeAluguel($republic_id, $user_id){
        $republic = Republic::findOrFail($republic_id);
        $user = User::findOrFail($user_id);
        $user->removeAluguel();
        $republic->removeUsuario();
        return response()->json([$user, $republic]);
    }

    public function favoritar($id, $republic_id){
        $favorite = User::findOrFail($id);
        $favorite->favoritas()->attach($republic_id);
        return response()->json($favorite); 
    } 

    public function desfavoritar($id, $republic_id){
        $favorite = User::findOrFail($id);
        $favorite->favoritas()->detach($republic_id);
        return response()->json(['Você removeu a curtida.']);
    }

    public function listFavoritos($id){
        $user = User::findOrFail($id);
        return response()->json($user->favoritas);
    }

}
