<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{

    protected $fillable = [
        'titre','description','projet_id','priorite','file_name', 'start_date', 'end_date',
    ];
    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }
}
