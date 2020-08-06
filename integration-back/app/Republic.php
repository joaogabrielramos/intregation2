<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\RepublicRequest;
use Illuminate\Http\Request;
use App\User;
use App\Comment;


class Republic extends Model

{
    public function userLocatario() {
        return $this->hasOne('App\User'); 
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function rooms(){
        return $this->hasMany('App\Room');
    }

    public function createRepublic(RepublicRequest $request) {
        $this->name = $request->name;
        $this->address = $request->address;
        $this->city = $request->city;
        $this->district = $request->district;
        $this->description = $request->description;
        $this->user_id = $request->user_id;
        $this->save();
    }   

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function removeUsuario(){
        $this->user_id = NULL;
        $this->save();
    }

    public function anunciar($user_id){
        $user = User::findOrFail($user_id);
        $this->user_id = $user_id;
        $this->save();
    }


    public function userFavoritas(){
        return $this->belongsToMany('App\User');
    }

    

}
