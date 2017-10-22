<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeton extends Model
{
    protected $table = 'jetons';

    public function enfant(){
        return $this->belongsTo('App\Enfant');
    }

    public function parent(){
        return $this->belongsTo('App\User');
    }
}
