<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function taches()
    {
        return $this->hasMany('App\Tache');
    }

    public function categorie()
    {
        return $this->belongsTo('App\Categorie');
    }
}
