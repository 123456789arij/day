<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'name_categories',
    ];

    public function projets()
    {
        return $this->hasMany('App\Projet');
    }








}
