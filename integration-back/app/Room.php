<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function republic(){
        return $this->belongsToMany('App\Republic');
    }
}
