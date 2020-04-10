<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'name', 'description', 'Categories_Id', 'Project_Status', 'start_date' , 'Deadline','file','id_client',
        'note',	'progress_bar',
    ];

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

    public function client()
    {
        return $this->belongsTo('App\Client');
    }


    public function employees()
    {
        return $this->belongsToMany('App\Employee');
    }


}
