<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Comment extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function republic() {
        return $this->belongsTo('App\Republic');
    }
}
