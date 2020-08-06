<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use App\Republic;
use App\Http\Requests\UserRequest;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function republics() {
        return $this->hasMany('App\Republic');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function alugar($republic_id){
        $republic = Republic::findOrFail($republic_id);
        $this->republic_id = $republic_id;
        $this->save();
    }

    public function removeAluguel(){
        $this->republic_id = NULL;
        $this->save();
    }

    public function favoritas(){
        return $this->belongsToMany('App\Republic', 'republic_users');
    }

    public function createUser(UserRequest $request){
        $this->name = $request->name;
        $this->email = $request->email;
        $this->telephone = $request->telephone;
        $this->email_verified_at = $request->email_verified_at;
        $this->password = bcrypt($request->password);
        $this->cpf = $request->cpf;
        $this->gender = $request->gender;
        $this->birthday = $request->birthday;
        $this->save();
    }

    use HasApiTokens;

}
