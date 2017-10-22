<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enfant extends Model
{
    protected $table = 'enfants';

    public function jetons(){
        return $this->hasMany('App\Jeton', 'enfant_id', 'id');
    }

    public function parent(){
        return $this->belongsTo('App\User');
    }
}
