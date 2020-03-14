<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{

    protected $fillable = [
        'titre','description','projet_id','priorite','image_name',
    ];
    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
