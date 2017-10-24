<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semaine extends Model
{
    protected $table = 'semaines';

    public function enfant(){
        return $this->belongsTo('App\Enfant');
    }

    public function parent(){
        return $this->belongsTo('App\User');
    }
}
