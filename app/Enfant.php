<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enfant extends Model
{
    protected $table = 'enfants';

    protected $fillable = [
        'prenom', 'pseudo', 'date_naissance', 'sexe', 'parent_id',
    ];

    public function jetons(){
        return $this->hasMany('App\Jeton', 'enfant_id', 'id');
    }

    public function parent(){
        return $this->belongsTo('App\User');
    }
}
