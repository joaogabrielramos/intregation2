<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RepublicRequest;
use App\Republic;
use App\User;
use App\Room;
use App\UserRequest;

class RepublicController extends Controller

{
    public function createRepublic(RepublicRequest $request) {
        $republic = new Republic;
        $republic->createRepublic($request);
        return response()->json($republic);
    }

    public function showRepublic($id){
        $republic = Republic::findOrFail($id);
        return response()->json($republic);
    }

    public function listRepublic(Request $request){
        $republic = Republic::all();
        return response()->json($republic);
    }

    public function softdeletedRepublics(Request $request){
        $result = Republic::withTrashed()->get();
        return response()->json($result);
    }

    public function updateRepublic(RepublicRequest $request, $id){
        $republic = Republic::findOrFail($id);
        if($request->name){
            $republic->name = $request->name;
        }

        if($request->address){
            $republic->address = $request->address;
        }

        if($request->city){
            $republic->city = $request->city;
        }
        
        if($request->district){
            $republic->district = $request->district;
        }

        if($request->description){
            $republic->description = $request->description;
        }

        $republic->save();
        return response()->json($republic);
    }


    public function deleteRepublic($id){
        Republic::destroy($id);
        return response()->json(['A república foi deletada com sucesso.']);
    }
    
    public function showOwner($id){
        $republic = Republic::findOrFail($id);
        $user = User::findOrFail($republic->user_id);
        return response()->json($user);
    }

    public function addUser($id, $republic_id)  {
        $user = User::findOrFail($id);
        $republic = Republic::findOrFail($republic_id);
        $republic->user_id = $id;
        $republic->save();
        return response()->json($republic);
    }

    public function removeUser($republic_id) {
        $republic = Republic::findOrFail($republic_id);
        $republic->user_id = NULL;
        $republic->save();
        return response()->json($republic);
    }

    public function getRepublicByName($republicName) {
       return $republic = Republic::where('name', $republicName)->get();
    }

    public function editRepublicByID($republic_id, Request $request) {
        $republic = Republic::findOrFail($republic_id);
        $republic->address = $request->address;
        $republic->save();
        return response()->json($republic);         
    }

    public function locatario($id){
        $republic = Republic::findOrFail($id);
        $locatarios = $republic->userLocatario->get();
        return response()->json($locatarios);
    }

    public function locador($id){
        $republic = Republic::findOrFail($id);
        return response()->json($republic->user);
    }

    public function retornarUsuarios($id){
        $republic = Republic::findOrFail($id);
        return response()->json($republic->users);
    }


}

