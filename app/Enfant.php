<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    protected $table = 'enfants';

    protected $fillable = [
        'prenom', 'pseudo', 'date_naissance', 'sexe', 'parent_id',
    ];

    public function semaines(){
        return $this->hasMany('App\Semaine', 'enfant_id', 'id');
    }

    public function parent(){
        return $this->belongsTo('App\User');
    }
}
